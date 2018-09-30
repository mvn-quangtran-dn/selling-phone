<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageUser extends FormRequest
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
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'yourname' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.required' => 'Mật khẩu không được để trống',
            'yourname.required' => 'Họ và tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',        
        ];
    }
}
