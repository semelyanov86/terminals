<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use Orderable;

    protected $fillable = [
      'amount', 'approved', 'id', 'phone', 'terminal_id',
    ];

    public function terminal()
    {
        return $this->belongsTo('App\Terminal');
    }
}
