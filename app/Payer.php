<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    protected $fillable = [
        'id', 'onees', 'name', 'mainsum', 'procent', 'prosrochka', 'chlvz', 'full'
    ];
}
