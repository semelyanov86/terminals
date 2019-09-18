<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Filial;

class FilialTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Filial $filial)
    {
        return [
            'id' => $filial->id,
            'name' => $filial->name,
            'display_name' => $filial->display_name,
            'description' => $filial->description,
        ];
    }
}
