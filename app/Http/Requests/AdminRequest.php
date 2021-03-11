<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'username'      => ['required', 'string','max:200', Rule::unique('admins')->ignore($this->admin)],
            'email'         => ['required', 'string','max:200', 'email', Rule::unique('admins')->ignore($this->admin)],
            'password'      => 'required|confirmed|min:6|string|max:200',
        ];
        if ($this->method() === 'PUT') {
            $rules['password'] = 'sometimes|nullable|confirmed|min:6|string|max:200';
        }
        return $rules;
    }
}
