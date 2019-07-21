<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
      'id', 'name', 'phone', 'ping_block', 'printer_block', 'published', 'server'
    ];

    public function getFirstImageAttribute()
    {
        return ConfigImage::where('config_id', '=', $this->id)->first();
    }
    public function getAllImagesAttribute()
    {
        return ConfigImage::where('config_id', '=', $this->id)->get();
    }
    public function getPingBlockDisplayAttribute()
    {
        if ($this->ping_block > 0) {
            return 'Да';
        } else {
            return 'Нет';
        }
    }
    public function getPrinterBlockDisplayAttribute()
    {
        if ($this->printer_block > 0) {
            return 'Да';
        } else {
            return 'Нет';
        }
    }
    public function getPublishedDisplayAttribute()
    {
        if ($this->published > 0) {
            return 'Да';
        } else {
            return 'Нет';
        }
    }
}
