<?php

namespace App\Transformers;

use App\Terminal;
use League\Fractal\TransformerAbstract;

class TerminalTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Terminal $terminal)
    {
        return [
            'id' => $terminal->id,
            'active' => $terminal->active,
            'name' => $terminal->name,
            'display_name' => $terminal->display_name,
            'description' => $terminal->description,
            'filial' => $terminal->filial->display_name,
            'category' => $terminal->category->name,
            'tmp_pass' => $terminal->tmp_pass,
        ];
    }
}
