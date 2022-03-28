<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'c_name' => 'required|unique:categories,c_name, '.$this->id,
            'c_menu_category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'c_name.required' => 'Trường này không được để trống.',
            'c_name.unique' => 'Tên danh mục đã tồn tại.',
            'c_menu_category_id.required' => 'Trường này không được để trống.',
            
        ];
    }
}
