<?php

namespace App\Http\Controllers;

use App\Events\PaymentCreated;
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
        $payments = Payment::latestFirst()->with('terminal')->with('payer')->sortByTerminal()->sortByAgreement()->sortById()->paginate(10);
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
        $payment->terminal()->associate($request->user());
        $payment->payer()->associate(Payer::findOrFail($request->payer_id));
        $payment->filial()->associate(Filial::findOrFail($request->user()->filial_id));
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
                $res = $client->get(config('app.onees_url') . 'platezh?' . 'id=' . $item->terminal_id . '&fio=' . $item->payer->name . '&summa=' . $item->sum  . '&dogovor=' . $item->agreement);
                if ($res->getStatusCode() == 200) {
                    $item->uploaded_at = Carbon::now();
                    $item->save();
                } elseif($res->getStatusCode() == 404) {
                    info('Agreement not found in 1c: ' . $item->agreement);
                } else {
                    info($res->getBody());
                }
            } catch(BadResponseException $e) {
                info($e->getMessage());
                if ($e->getCode() == 404) {
                    info('Agreement not found in 1c: ' . $item->agreement);
                }
            }
            sleep(config('app.sleep'));
        });
        return redirect()->route('payments.index')->with('message', 'Данные успешно отправлены на сервер 1с');
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
