<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
        return [ 'author_name'=>'required|string'
        ];
    }
    public function messages(){
        return [
            'author_name.required'=>'author name is required',
            'author_name.string'=>'author name must be string'
        ];
    }
}
