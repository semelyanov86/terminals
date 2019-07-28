<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncassationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: Added user authorization for incassation process
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
            'id' => 'nullable|integer',
            'amount' => 'required|integer',
            'quantity' => 'required|integer',
            'terminal_id' => 'nullable|integer',
            'user_id' => 'required|integer',
            'incassation_date' => 'required|date_format:Y-m-d H:i:s'
        ];
    }
}
