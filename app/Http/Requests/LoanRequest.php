<?php

namespace App\Http\Requests;

use App\Rules\Isphoneblocked;
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
            'id' => [
                'nullable',
                'integer',
            ],
            'phone' => ['required', 'regex:/(7)[0-9]{10}/', new Isphoneblocked],
            'terminal_id' => [
                'nullable',
                'integer',
            ],
            'amount' => [
                'required',
                'integer',
            ],
            'approved' => [
                'nullable',
                'integer',
                'max:2',
            ],
        ];
    }
}
