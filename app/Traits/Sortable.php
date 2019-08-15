<?php

namespace App\Traits;

trait Sortable
{

    public function scopeSortByTerminal($query)
    {
        return $query->when(request('terminal'), function($query){
            return $query->where('terminal_id', '=', request('terminal'));
        });
    }

    public function scopeSortByAgreement($query)
    {
        return $query->when(request('agreement'), function($query){
            return $query->where('agreement', '=', request('agreement'));
        });
    }

    public function scopeSortById($query)
    {
        return $query->when(request('id'), function($query){
            return $query->where('id', '=', request('id'));
        });
    }

    public function scopeSortByDate($query)
    {
        return $query->when(request('daterange'), function($query){
            return $query->whereBetween('payment_date', explode('/', request('daterange')));
        });
    }

    public function scopeSortByLoans($query)
    {
        return $query->where('is_saving', '=', '0');
    }

    public function scopeSortBySavings($query)
    {
        return $query->where('is_saving', '=', '1');
    }
}
