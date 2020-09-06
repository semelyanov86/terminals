<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockedPhone extends Model
{
    protected $table = 'blocked_phones';

    protected $fillable = [
        'id', 'phone', 'description',
    ];
}
