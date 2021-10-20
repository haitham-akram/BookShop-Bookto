<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
        return ['Place_name'=>'required|string',
                'Shop_name'=>'required|string'
        ];
    }
    public function messages(){
        return [
            'Place_name.required'=>'place name is required',
            'Place_name.string'=>'place name must be string',
            'Shop_name.required'=>'Shop name is required',
            'Shop_name.string'=>'shop name must be string'
        ];
    }
}
