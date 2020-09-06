<?php

namespace App\Transformers;

use App\Loan;
use League\Fractal\TransformerAbstract;

class LoanTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Loan $loan)
    {
        return [
            'id' => $loan->id,
            'created_at' => $loan->created_at,
            'phone' => $loan->phone,
            'amount' => $loan->amount,
        ];
    }
}
