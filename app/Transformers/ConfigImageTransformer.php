<?php

namespace App\Transformers;

use App\ConfigImage;
use League\Fractal\TransformerAbstract;

class ConfigImageTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ConfigImage $image)
    {
        return [
            'id' => $image->id,
            'filename' => $image->filename
        ];
    }
}
