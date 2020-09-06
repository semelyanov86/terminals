<?php

namespace App\Tables\Builders;

use App\Incassation;
use LaravelEnso\Tables\app\Services\Table;

//use LaravelEnso\Examples\app\Models\Example;

class IncassationTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/incassation.json';

    public function query()
    {
        return Incassation::selectRaw('
            id as "dtRowId", amount, incassation_date, quantity, terminal_id,
            user_id
        ');
    }
}
