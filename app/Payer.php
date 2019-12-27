<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class Payer extends Model
{
    use Orderable;
    protected $fillable = [
        'id', 'onees', 'name', 'mainsum', 'procent', 'prosrochka', 'chlvz', 'full', 'is_saving'
    ];

    /**
     * Get the payments for the terminal.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment')->latestFirst();
    }
}
