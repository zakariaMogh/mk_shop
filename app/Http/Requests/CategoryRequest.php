<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:200|unique:categories,name',
            'image' => 'sometimes|nullable|file|image|max:2000',
        ];
        if ($this->method() === 'PUT')
        {
            $id = $this->route('category')->id;
            $rules['name'] = 'required|string|max:200|unique:categories,name,'.$id;
        }
        if (Str::contains(url()->previous(),'sub')){
            $rules['parent_id'] = 'required|numeric|gt:0';
        }
        return $rules;
    }
}
