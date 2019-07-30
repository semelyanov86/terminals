<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->user()->active;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cashmashine' => 'required|min:5|max:190',
            'cashmashine_state' => 'required|integer|max:2',
            'modem' => 'required|min:5|max:190',
            'printer' => 'required|min:5|max:190',
            'printer_state' => 'required|integer|max:2'
        ];
    }
}
