<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieFormRequest extends FormRequest
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
        //dd($this->all());
        return [
            'title' => 'required | max:250',
            'poster' => 'required | mimes:jpeg,jpg,png',
            'background' => 'nullable | mimes:jpeg,jpg,png',
            'language' => 'required',
            'runtime' => 'nullable | integer',
            'plot' => 'nullable | string',
            'synopsis' => 'nullable | string',
            'release_date' => 'nullable | date',
            'view' => 'nullable | integer'
        ];
    }
}
