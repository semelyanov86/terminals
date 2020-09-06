<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TerminalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('create terminals');
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
            'name'=>'required|max:120|alpha_num|unique:terminals,name,'.$this->id,
            'display_name'=>'required|max:190|min:5',
            'password'=>'required|min:6|max:20|confirmed',
            'category_id' => 'required|integer',
            'description' => 'nullable|min:10|max:500',
            'filial_id' => 'required|integer',
            'log_path' => 'nullable|alpha_num',
            'user_id' => 'required|integer',
            'cashmashine' => 'nullable|alpha_dash|max:190|min:5',
            'inkasso_pass' => 'nullable|min:5|max:10',
            'modem' => 'nullable|alpha_dash|max:190|min:5',
            'printer' => 'nullable|alpha_dash|max:190|min:5',
            'tmp_pass' => 'nullable|min:5|max:10',
        ];
    }
}
