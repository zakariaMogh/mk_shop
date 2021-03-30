<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LVR\Colour\Hex;


class ProductRequest extends FormRequest
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
        $rules = [
            'name'              => 'required|string|max:200',
            'cashback'          => 'nullable|numeric|between:0,999999.99',
            'price'             => 'required|numeric|between:0,999999.99',
            'categories'        => 'required|array|min:2',
            'brand'             => 'nullable|string|max:200',
            'quality'           => 'nullable|string|max:200',
            'categories.*'      => 'required|numeric|gt:0',
            'description'       => 'required|string',
            'images.*'          => 'required|file|image|max:5000',
            'sizes'             => 'required|array|min:1',
            'sizes.*'           => 'required|string|max:190',
            'colors'            => 'required|array|min:1',
            'colors.*'          => 'required|array|min:1',
            'colors.*.*'        => ['required', new Hex],
            'quantities'        => 'required|array|min:1',
            'quantities.*'      => 'required|array|min:1',
            'quantities.*.*'    => 'required|numeric',
        ];
        if ($this->method() === 'PUT')
        {
            $rules['images[]'] = 'sometimes|nullable|file|image|max:5000';
        }
        return $rules;
    }
}
