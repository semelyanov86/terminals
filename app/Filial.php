<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $fillable = [
        'id', 'name', 'display_name', 'description',
    ];

    /**
     * Get the terminals for the filial.
     */
    public function terminals()
    {
        return $this->hasMany('App\Terminal');
    }

    /**
     * Get the payments for the terminal.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
