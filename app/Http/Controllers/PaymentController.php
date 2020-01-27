<?php

namespace App\Http\Controllers;

use App\Events\PaymentCreated;
use App\Exports\PaymentsExport;
use App\Filial;
use App\Http\Requests\PaymentRequest;
use App\Jobs\PaymentSender;
use App\Payer;
use App\Payment;
use App\Transformers\DynamicTransformer;
use App\Transformers\PaymentTransformer;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use App\Terminal;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $payments = Payment::latestFirst()->with('terminal')->with('payer')
            ->when(request('savings'), function($query){
            return $query->where('is_saving', '=', '1');
        })
            ->when(request('loans'), function($query){
            return $query->where('is_saving', '=', '0');
        })
//            ->sortByLoans()
            ->sortByTerminal()->sortByAgreement()->sortById()->paginate(10);
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $payment = new Payment;
        $payment->agreement = $request->agreement;
        $payment->payment_date = $request->payment_date;
        $payment->sum = $request->sum;
        if ($request->is_saving) {
            $payment->is_saving = $request->is_saving;
        } else {
            $payment->is_saving = '0';
        }
        $payment->number = $request->number;
        $payment->terminal()->associate($request->user());
        $payment->payer()->associate(Payer::findOrFail($request->payer_id));
        $payment->filial()->associate(Filial::findOrFail($request->user()->filial_id));
        if ($request->fio && $request->fio != '') {
            $payment->fio = $request->fio;
        } else {
            $payment->fio = Payer::findOrFail($request->payer_id)->name;
        }
        $payment->save();

        event(new PaymentCreated($payment));
        PaymentSender::dispatch($payment);

        return fractal()
            ->item($payment)
            ->parseIncludes(['terminal'])
            ->transformWith(new PaymentTransformer)
            ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        $allPayments = Payment::all();
        $payments = $allPayments->filter(function ($value, $key){
            return $value->uploaded_at == NULL;
        });
        $payments->each(function ($item, $key){
            $client = new Client();
            try {
                $res = $client->get(config('app.onees_url') . 'platezh?' . 'id=' . $item->terminal_id . '&fio=' . $item->payer->name . '&summa=' . $item->sum  . '&dogovor=' . $item->agreement . '&transaction=' . $item->number);
//                $res = $client->post(config('app.onees_url') . 'platezh?' . 'id=' . $item->terminal_id . '&fio=' . $item->payer->name . '&summa=' . $item->sum  . '&dogovor=' . $item->agreement . '&transaction=' . $item->number);
//                $res = $client->get(config('app.onees_url') . 'platezh?' . 'id=' . $item->terminal_id . '&fio=' . $item->payer->name . '&summa=' . $item->sum  . '&dogovor=' . $item->agreement . '&transaction=' . $item->number);
                /*$res = $client->post(config('app.onees_url') . 'platezh', array(
                    'form_params' => array(
                        'id' => $item->terminal_id,
                        'fio' => $item->fio,
                        'summa' => $item->sum,
                        'dogovor' => $item->agreement,
                        'transaction' => $item->number
                    )
                ));*/
                if ($res->getStatusCode() == 200) {
                    $item->uploaded_at = Carbon::now();
                    $item->save();
                } elseif($res->getStatusCode() == 404) {
                    info(trans('app.agreement-not-found') . $item->agreement);
                } elseif($res->getStatusCode() == 500) {
                    info(trans('app.agreement-export-error') . $item->agreement);
                } else {
                    info(trans('app.agreement-export-other-error') . $item->agreement);
                }
            } catch(BadResponseException $e) {
                info($e->getMessage());
                if ($e->getCode() == 404) {
                    info(trans('app.agreement-not-found') . $item->agreement);
                }
            }
            sleep(config('app.sleep'));
        });
        return redirect()->route('payments.index')->with('message', trans('app.data-sent'));
    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new PaymentsExport, 'payments.csv');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDynamic()
    {
        $payments = Payment::where('payment_date', '>=', \Carbon\Carbon::now()->subDays(7))->orderBy('payment_date', 'DESC')->get(['payment_date', 'sum'])
            ->groupBy(function($pool) {
                return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pool->payment_date)->format('Y-m-d');
            })->map(function ($value, $key) {
                return array($key, $value->sum('sum'));
            });

        return fractal()->collection($payments)->transformWith(new DynamicTransformer)->toArray();
    }
}
