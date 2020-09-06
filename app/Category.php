<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Get the terminals for the filial.
     */
    public function terminals()
    {
        return $this->hasMany(\App\Terminal::class);
    }
}
