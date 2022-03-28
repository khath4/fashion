<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        if($this->id)
        {
            return [
                'pro_name' => 'required|unique:products,pro_name, '.$this->id,
                'pro_category_id' => 'required',
                'pro_brand_id' => 'required',
                'pro_price' => 'required',
                'pro_description' => 'required',
                'pro_content' => 'required',
            ];
        }
        else
        {
            return [
                'pro_name' => 'required|unique:products,pro_name, '.$this->id,
                'pro_category_id' => 'required',
                'pro_brand_id' => 'required',
                'pro_price' => 'required',
                'pro_description' => 'required',
                'pro_content' => 'required',
                'pro_avatar' => 'required'.$this->id,
            ];
        }
    }
    public function messages()
    {
        return [
            'pro_name.required' => 'Trường này không được để trống.',
            'pro_name.unique' => 'Tên sản phẩm đã tồn tại.',
            'pro_category_id.required' => 'Trường này không được để trống.',
            'pro_brand_id.required' => 'Trường này không được để trống.',
            'pro_price.required' => 'Trường này không được để trống.',
            'pro_description.required' => 'Trường này không được để trống.',
            'pro_content.required' => 'Trường này không được để trống.',
            'pro_avatar.required' => 'Trường này không được để trống.',
        ];
    }
}
