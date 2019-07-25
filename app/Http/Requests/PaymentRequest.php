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
            'agreement' => 'required|digits_between:10,15',
            'filial_id' => 'nullable|integer',
            'payer_id' => 'required|integer',
            'payment_date' => 'required|date_format:Y-m-d H:i:s',
            'sum' => 'required|integer',
            'terminal_id' => 'required|integer',
            'uploaded_at' => 'nullable|date_format:Y-m-d H:i:s'

        ];
    }
}
