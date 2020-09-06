<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigImage extends Model
{
    protected $fillable = ['config_id', 'filename'];

    public function config()
    {
        return $this->belongsTo(\App\Config::class);
    }
}
