<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    protected $fillable = [
      'amount', 'approved', 'id', 'phone', 'terminal_id'
    ];

    public function terminal()
    {
        return $this->belongsTo('App\Terminal');
    }

}
