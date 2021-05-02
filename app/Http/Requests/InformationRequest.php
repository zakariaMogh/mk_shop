<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'email' => 'required|email|max:190',
            'phone' => 'required|string|max:15|min:9',
            'address' => 'required|string|max:200',
            'wilaya' => 'required|string|max:200',
            'province' => 'required|string|max:200',
            'logo' => 'nullable|sometimes|file|image|max:5000',
        ];

        return $rules;
    }
}
