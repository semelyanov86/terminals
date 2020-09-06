<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('edit own user');
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
            'name'=>[
                'required',
                'max:120',
            ],
            'email'=> [
                'required',
                'email',
                'unique:users,email,'.$this->id,
            ],
            'password'=>[
                'required',
                'min:6',
                'confirmed',
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
        ];
    }
}
