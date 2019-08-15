<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;
use App\Traits\Sortable;

class Payment extends Model
{

    use Orderable, Sortable;

    protected $fillable = [
      'agreement', 'filial_id', 'payer_id', 'payment_date', 'sum', 'fio', 'is_saving', 'terminal_id', 'uploaded_at'
    ];

    public function filial()
    {
        return $this->belongsTo('App\Filial');
    }

    public function payer()
    {
        return $this->belongsTo('App\Payer');
    }

    public function terminal()
    {
        return $this->belongsTo('App\Terminal');
    }
}
