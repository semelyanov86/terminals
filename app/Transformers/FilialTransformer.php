<?php

namespace App\Transformers;

use App\Filial;
use League\Fractal\TransformerAbstract;

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
