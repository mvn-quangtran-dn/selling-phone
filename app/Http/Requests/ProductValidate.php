<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;
use Validator;
use Illuminate\Http\Request;

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
        $products = Product::pluck('id')->toArray();
        return [
            "name" => "bail|required|min:6|max:50|unique:products,name,".$this->id,
            "cpu" => "bail|required",
            "screen" => "bail|required",
            "system" => "bail|required",
            "bcamera" => "bail|required|numeric",
            "fcamera" => "bail|required|numeric",
            "ram" => "bail|required|numeric",
            "rom" => "bail|required|numeric",
            "smenory" => "bail|required|numeric",
            "pin" => "bail|required|numeric",
            "quantity" => "bail|required|numeric",
            "price" => "bail|required|numeric",
            "description" => "bail|required|min:20",
            "category_id" => "bail|required|numeric",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Tên của sản phẩm không được để trống",
            "name.alpha_dash" => "Tên của sản phẩm phải là chữ và số",
            "name.min" => "Tên sản phẩm không có độ dài nhỏ hơn :min",
            "name.max" => "Tên sản phẩm không có độ dài lớn hơn :max",
            "name.unique" => "Tên sản phẩm không được trùng",
            "cpu.required" => "Trường CPU không được để trống",
            "screen.required" => "Trường Màn Hình  không được để trống",
            "system.required" => "Trường Hệ Điều Hành  không được để trống",
            "bcamera.required" => "Trường Camera sau không được để trống",
            "bcamera.numeric" => "Trường Camera sau phải là số",
            "fcamera.required" => "Trường Camera trước không được để trống",
            "fcamera.numeric" => "Trường Camera trước phải là số",
            "ram.required" => "Trường Ram không được để trống",
            "ram.numeric" => "Trường Ram phải là số",
            "rom.required" => "Trường Bộ nhớ trong không được để trống",
            "rom.numeric" => "Trường Bộ nhớ trong phải là số",
            "smenory.required" => "Trường Thẻ nhớ ngoài không được để trống",
            "smenory.numeric" => "Trường Thẻ nhớ ngoài phải là số",
            "quantity.required" => "Trường Số lượng không được để trống",
            "quantity.numeric" => "Trường Số lượng phải là số",
            "pin.required" => "Trường Pin không được để trống",
            "pin.numeric" => "Trường Pin phải là số",
            "images.required" => "Trường Hình ảnh không được để trống",
            "images.images" => "Trường Hình ảnh phải là hình ảnh",
            "category_id.required" => "Trường Danh mục không được để trống",
            "category_id.numeric" => "Trường Danh mục phải là hình ảnh",
            "images" => "Hình ảnh không được để trống",
        ];
    }
}
