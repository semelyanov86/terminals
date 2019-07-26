<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Traits\Orderable;

class Loan extends Model
{
    use Orderable;

    protected $fillable = [
      'amount', 'approved', 'id', 'phone', 'terminal_id'
    ];

    public function terminal()
    {
        return $this->belongsTo('App\Terminal');
    }

}
