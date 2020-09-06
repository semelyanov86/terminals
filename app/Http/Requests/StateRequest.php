<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
            'cashmashine_state' => [
                'required',
                'integer',
                'max:2',
            ],
            'printer_state' => [
                'required',
                'integer',
                'max:2',
            ],
            'update_state' => [
                'required',
                'date_format:Y-m-d H:i:s',
            ],
        ];
    }
}
