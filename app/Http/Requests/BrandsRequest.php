<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'b_name' => 'required|unique:brands,b_name, '.$this->id,
            // 'b_icon' => 'required',
           
        ];
    }
    public function messages()
    {
        return [
            'b_name.required' => 'Trường này không được để trống.',
            'b_name.unique' => 'Tên thương hiệu đã tồn tại.',
            // 'b_icon.required' => 'Trường này không được để trống.',
        ];
    }
}
