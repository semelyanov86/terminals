<?php

namespace App;

use App\Traits\Orderable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;

class Incassation extends Model
{
    use Orderable, Sortable;

    protected $fillable = [
      'id', 'quantity', 'amount', 'user_id', 'terminal_id', 'incassation_date',
    ];

    public function terminal()
    {
        return $this->belongsTo(\App\Terminal::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function filial()
    {
        return $this->hasOneThrough(\App\Filial::class, \App\Terminal::class);
    }
}
