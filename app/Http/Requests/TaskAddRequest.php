<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskAddRequest extends FormRequest
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
            'user_id' => 'required',
            'from_id' => 'string|required|max:10',
            'title' => 'string|required|min:3',
            'content'=> 'string|required',
            'lifetime'=>'required',
            'time'   => 'required',
        ];
    }
}
