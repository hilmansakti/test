<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'    => 'required|min:1',
            'last_name'     => 'required|min:1',
            'email'         => 'required|email|unique:users,email',
            'terms'         => 'required',
            'password'      => ['required', 'min:6', 'regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/', 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'password.regex'    => 'Password must contain at least one number and both uppercase and lowercase letters.',
            'terms.required'    => 'Please check this box if you want to proceed.'
        ];
    }

}
