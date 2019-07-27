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
}
