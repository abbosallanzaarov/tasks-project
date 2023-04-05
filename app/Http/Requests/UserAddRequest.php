<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|min:1|required',
            'email'=> 'unique:users,email|required',
            'password'=> 'required|min:8',
            'age'=> 'nullable|numeric',
            'job'=> 'string|nullable',
            'role' => 'max:7',
        ];
    }
}
