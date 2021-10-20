<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'Book_name'=>'required|string',
            'Book_category'=>'required|string',
            'Book_author'=>'required|string',
            'Publishing_place'=>'required|string',
            'img'=>'required|string',
            'Issue_Number'=>'required|numeric|min:1',
            'Release_year'=>'required|numeric|min:1900|max:2021'
        ];
    }
    public function messages()
    {
        return ['Book_name.required'=>'Book name is required',
                'Book_name.string'=>'Book name must be string',
                'Book_author.required'=>'Please choose Author is required',
                'Book_author.string'=>'Book Author must be string',
                'Book_Category.required'=>'Please choose a Category',
                'Book_Category.string'=>'Book Category must be string',
                'Publishing_place.required'=>'Please choose a Publishing place',
                'Publishing_place.string'=>'Publishing place must be string',
                'img.required'=>'Book Image is required',
                'img.string'=>'Book Image must be string',
                'Issue_Number.required'=>'Issue Number is required',
                'Issue_Number.numeric'=>'Issue Number must be number',
                'Issue_Number.min:1'=>'Issue Number must be number more than 1',
                'Release_year.required'=>'Release year is required',
                'Release_year.min:1900'=>'Release year must be year more than 1900',
                'Release_year.max:2021'=>'Release year must be year less than 2021',
        ];
    }
}
