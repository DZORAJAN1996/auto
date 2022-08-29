<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandsRequest extends FormRequest
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
            'name'=>'required|string|min:2|max:190'
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'Название марки обязательно',
            'name.string'=>'Название должно быть текст',
            'name.min'=>'Символы должны быть больше двух',
            'name.max'=>'Символы должны быть меньше 190',
        ];
    }
}
