<?php

namespace App\Http\Requests;

use App\Rules\Checkpublished;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ConfigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('create configs');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'id' => 'nullable|integer',
            'name'=>'required|alpha_num|max:120',
            'phone' => 'required|regex:/(7)[0-9]{10}/',
            'company' => 'required|min:5|max:100',
            'website' => 'required|url',
            'serverName' => 'required|url',
            'published' => [new Checkpublished()]
        ];
        if ($this->images) {
            $photos = count($this->images);
            foreach(range(0, $photos) as $index) {
                $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
            }
        }

        return $rules;
    }
}
