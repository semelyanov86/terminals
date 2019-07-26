<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'agreement', 'filial_id', 'payer_id', 'payment_date', 'sum', 'terminal_id', 'uploaded_at'
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