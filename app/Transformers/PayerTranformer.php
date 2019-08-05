<?php

namespace App\Transformers;

use App\Payer;
use League\Fractal\TransformerAbstract;

class PayerTranformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Payer $payer)
    {
        return [
            'id' => $payer->id,
            'onees' => $payer->onees,
            'chlvz' => $payer->chlvz,
            'full' => $payer->full,
            'mainsum' => $payer->mainsum,
            'name' => $payer->name,
            'procent' => $payer->procent,
            'prosrochka' => $payer->prosrochka
        ];
    }
}
