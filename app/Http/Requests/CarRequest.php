<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'brand_id'=>'required|exists:brands,id',
            'model_id'=>'required|exists:car_models,id',
            'year'=>'required|numeric',
            'number_plate'=>'required|max:190|string',
            'transmission'=>'required|in:manual,automatic',
            'color'=>'required|string',
            'price'=>'required|integer',
            'image'=>'mimes:jpeg,png,jpg'
        ];
    }
}
