<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title' => 'required|string|max:200',
            'link' => 'required|string|max:600',
            'image' => 'required|file|image|max:2000',
        ];
        if ($this->method() === 'PUT')
        {
            $rules['image'] = 'sometimes|nullable|file|image|max:2000';
        }
        return $rules;
    }
}
