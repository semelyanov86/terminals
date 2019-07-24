<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incassation extends Model
{

    protected $fillable = [
      'id', 'quantity', 'amount', 'user_id', 'terminal_id'
    ];

    public function terminal()
    {
        return $this->belongsTo('App\Terminal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
