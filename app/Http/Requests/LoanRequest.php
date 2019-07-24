<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'phone' => 'required|regex:/(7)[0-9]{10}/',
            'terminal_id' => 'required|integer',
            'amount' => 'required|integer',
            'approved' => 'nullable|integer|max:2'
        ];
    }
}
