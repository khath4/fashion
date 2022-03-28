<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuCategoryRequest extends FormRequest
{ 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mc_name' => 'required|unique:menu_categories,mc_name, '.$this->id,
            
        ];
    }
    public function messages()
    {
        return [
            'c_name.required' => 'Trường này không được để trống.',
            'c_name.unique' => 'Tên danh mục đã tồn tại.',        
        ];
    }
}
