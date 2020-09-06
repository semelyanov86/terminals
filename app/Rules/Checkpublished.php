<?php

namespace App\Rules;

use App\Config;
use Illuminate\Contracts\Validation\Rule;

class Checkpublished implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value == 'on') {
            $configs = Config::where('published', '=', '1')->get()->count();
            if ($configs > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Вы можете сохранить только одну опубликованную конфигурацию';
    }
}
