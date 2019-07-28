<?php

namespace App\Transformers;

use App\Incassation;
use App\User;
use League\Fractal\TransformerAbstract;

class IncassationTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user', 'terminal'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Incassation $incassation)
    {
        return [
            'id' => $incassation->id,
            'created_at' => $incassation->created_at,
            'amount' => $incassation->amount,
            'quantity' => $incassation->quantity
        ];
    }

    public function includeTerminal(Incassation $incassation)
    {
        return $this->item(request()->user(), new TerminalTransformer);
    }

    public function includeUser(Incassation $incassation)
    {
        return $this->item(User::whereId($incassation->user_id)->first(), new UserTransformer);
    }
}
