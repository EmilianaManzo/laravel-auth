<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TecnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required |min:3|max:60',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Il campo è obbligatorio' ,
            'name.min' => 'Il campo deve contenere :min caratteri' ,
            'name.max' => 'Il campo deve contenere :max caratteri' ,


        ];
    }
}
