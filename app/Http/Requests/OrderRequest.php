<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'phone'             => 'required|string|max:15|min:9',
            'address'           => 'required|string|max:200',
            'wilaya'            => 'required|string|max:200',
            'province'          => 'required|string|max:200',
            'cashback_sum'      => 'nullable|numeric|between:0,999999.99',
            'sub_total'         => 'required|numeric|between:0,999999.99',
            'total'             => 'nullable|numeric|between:0,999999.99',
            'shipping'          => 'nullable|numeric|between:0,999999.99',
            'user'              => 'required|numeric|gt:0',
            'products'          => 'required|array|min:2',
            'products.*'        => 'required|numeric|gt:0',
        ];
        return $rules;
    }
}
