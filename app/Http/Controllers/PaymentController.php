<?php

namespace App\Http\Controllers;

use App\Events\PaymentCreated;
use App\Filial;
use App\Http\Requests\PaymentRequest;
use App\Payer;
use App\Payment;
use App\Transformers\PaymentTransformer;
use Illuminate\Http\Request;
use App\Terminal;

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
    public function show($id)
    {
        //
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
}
