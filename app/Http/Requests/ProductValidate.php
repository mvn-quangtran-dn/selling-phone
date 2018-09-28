<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
            "name" => "bail|required|alpha_dash|min:6|max:50",
            "cpu" => "bail|required|numeric",
            "screen" => "bail|required|numeric",
            "system" => "bail|required|alpha_dash",
            "bcamera" => "bail|required|numeric",
            "fcamera" => "bail|required|numeric",
            "ram" => "bail|required|numeric",
            "rom" => "bail|required|numeric",
            "smemory" => "bail|required|numeric",
            "pin" => "bail|required|numeric",
            "quantity" => "bail|required|numeric",
            "price" => "bail|required|numeric",
            "description" => "bail|required|min:20|max:255",
            "category_id" => "bail|required|numeric",
            "images" => "bail|required|image",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Tên của sản phẩm không được để trống",
            "name.alpha_dash" => "Tên của sản phẩm phải là chữ và số để trống",
            "name.min" => "Tên sản phẩm không có độ dài nhỏ hơn :min",
            "name.max" => "Tên sản phẩm không có độ dài lớn hơn :max",
            "cpu.required" => "Trường CPU không được để trống",
            "cpu.numeric" => "Trường CPU phải là số",
            "screen.required" => "Trường Màn Hình  không được để trống",
            "screen.numeric" => "Trường  Màn Hình phải là số",
            "system.required" => "Trường Hệ Điều Hành  không được để trống",
            "system.alpha_dash" => "Trường  Hệ Điều Hành phải là chữ và số",
            "bcamera.required" => "Trường Camera sau không được để trống",
            "bcamera.numeric" => "Trường Camera sau phải là số",
            "fcamera.required" => "Trường Camera trước không được để trống",
            "fcamera.numeric" => "Trường Camera trước phải là số",
            "ram.required" => "Trường Ram không được để trống",
            "ram.numeric" => "Trường Ram phải là số",
            "rom.required" => "Trường Bộ nhớ trong không được để trống",
            "rom.numeric" => "Trường Bộ nhớ trong phải là số",
            "smemory.required" => "Trường Thẻ nhớ ngoài không được để trống",
            "smemory.numeric" => "Trường Thẻ nhớ ngoài phải là số",
            "quantity.required" => "Trường Số lượng không được để trống",
            "quantity.numeric" => "Trường Số lượng phải là số",
            "pin.required" => "Trường Pin không được để trống",
            "pin.numeric" => "Trường Pin phải là số",
            "images.required" => "Trường Hình ảnh không được để trống",
            "images.images" => "Trường Hình ảnh phải là hình ảnh",
            "category_id.required" => "Trường Danh mục không được để trống",
            "category_id.numeric" => "Trường Danh mục phải là hình ảnh",

        ];
    }
}
