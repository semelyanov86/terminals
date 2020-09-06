<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class DynamicTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($dynamic)
    {
        return [
            'date' => $dynamic[0],
            'sum' => $dynamic[1],
        ];
    }
}
