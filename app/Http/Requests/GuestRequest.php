<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
            'place'=>'string',
            'category'=>'string',
            'author'=>'string'
        ];
    }
    public function messages()
    {
        return [
            'author.string'=>'author name must be string',
            'category.string'=>'category name must be string',
            'place.string'=>'shop name must be string'
            ];
    }
}
