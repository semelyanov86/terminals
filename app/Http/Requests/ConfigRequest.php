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
            'phone' => 'required|max:15',
            'company' => 'required|min:5|max:100',
            'website' => 'required|url',
            'serverName' => 'required|url',
            'published' => [new Checkpublished()],
            'image' => 'image|max:9000',
        ];
        if ($this->images) {
            $photos = count($this->images);
            foreach (range(0, $photos) as $index) {
                $rules['photos.'.$index] = 'image|max:9000';
            }
        }

        return $rules;
    }
}
