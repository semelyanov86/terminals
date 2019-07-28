<?php

namespace App\Rules;

use App\BlockedPhone;
use Illuminate\Contracts\Validation\Rule;

class Isphoneblocked implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $findPhone = BlockedPhone::where('phone', '=', $value)->count();
        if ($findPhone > 0) {
            return false;
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
        return 'The :attribute is blocked.';
    }
}
