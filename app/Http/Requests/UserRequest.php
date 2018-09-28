<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|min:6',
            'yourname' => 'required|string|max:255',
            'phone' => 'required|numeric|min:11|max:20',
            'address' => 'required|string',
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
            'yourname.required' => 'Please enter your yourname',
            'phone.required' => 'Please enter your phone',
            'address.required' => 'Please enter your address'
        ];
    }
}
