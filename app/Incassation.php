<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;
use App\Traits\Sortable;

class Incassation extends Model
{

    use Orderable, Sortable;

    protected $fillable = [
      'id', 'quantity', 'amount', 'user_id', 'terminal_id', 'incassation_date'
    ];

    public function terminal()
    {
        return $this->belongsTo('App\Terminal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function filial()
    {
        return $this->hasOneThrough('App\Filial', 'App\Terminal');
    }
}
