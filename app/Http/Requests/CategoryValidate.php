<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class CategoryValidate extends FormRequest
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
            'name' => "required|min:3|max:12",
            'parent_id' => "bail|min:0|max:3",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Không được để trống tên danh mục",
            'name.min' => "Tên danh mục không được nhỏ hơn :min",
            'name.max' => "Tên danh mục không được nhỏ hơn :max",
            'parent_id.required' => "Không được để trống danh mục",
            'parent_id.numeric' => "Danh mục phải là số",
        ];
    }
}
