<?php

namespace App\Transformers;

use App\Payment;
use League\Fractal\TransformerAbstract;

class PaymentTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['terminal'];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Payment $payment)
    {
        return [
            'id' => $payment->id,
            'filial' => $payment->filial->display_name,
            'sum' => $payment->sum,
            'created_at' => $payment->created_at->toDateTimeString(),
            'payer' => $payment->payer->name,
        ];
    }

    public function includeTerminal(Payment $payment)
    {
        return $this->item($payment->terminal, new TerminalTransformer);
    }
}
