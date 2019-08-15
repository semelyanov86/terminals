<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'id' => 'nullable|integer',
            'agreement' => 'required|digits_between:10,15',
            'filial_id' => 'nullable|integer',
            'payer_id' => 'required|integer',
            'payment_date' => 'required|date_format:Y-m-d H:i:s',
            'sum' => 'required|integer',
            'terminal_id' => 'nullable|integer',
            'uploaded_at' => 'nullable|date_format:Y-m-d H:i:s',
            'fio' => 'nullable|min:5|max:190',
            'is_saving' => 'nullable|integer|max:2',
            'number' => 'required|integer|digits_between:5,20'

        ];
    }
}
