<?php

namespace App;

use App\Traits\Orderable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Orderable, Sortable;

    protected $fillable = [
      'agreement', 'filial_id', 'payer_id', 'payment_date', 'sum', 'fio', 'is_saving', 'terminal_id', 'uploaded_at',
    ];

    public function filial()
    {
        return $this->belongsTo(\App\Filial::class);
    }

    public function payer()
    {
        return $this->belongsTo(\App\Payer::class);
    }

    public function terminal()
    {
        return $this->belongsTo(\App\Terminal::class);
    }
}
