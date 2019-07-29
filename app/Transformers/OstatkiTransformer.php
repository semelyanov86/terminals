<?php

namespace App\Transformers;

use App\Payment;
use App\Terminal;
use League\Fractal\TransformerAbstract;

class OstatkiTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['terminal'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Terminal $terminal)
    {
        $sum = Payment::where('terminal_id', '=', $terminal->id)->where('incassed', '=', '0')->sum('sum');
        return [
            'sum' => $sum
        ];
    }

    public function includeTerminal(Terminal $terminal)
    {
        return $this->item($terminal, new TerminalTransformer);
    }
}
