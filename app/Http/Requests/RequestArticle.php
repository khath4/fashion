<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
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
                'a_name' => 'required|unique:article,a_name, '.$this->id,
                'a_description' => 'required|max:255',
                'a_content' => 'required',  
            ];
        }
        else
        {
            return [
                'a_name' => 'required|unique:article,a_name, '.$this->id,
                'a_description' => 'required|max:255',
                'a_content' => 'required',
                'a_avatar' => 'required'  
            ];
        }
    }
    public function messages()
    {
        return [
            'a_name.required' => 'Trường này không được để trống.',
            'a_name.unique' => 'Tên bài viết đã tồn tại.',
            'a_description.required' => 'Trường này không được để trống.',
            'a_description.max' => 'Trường này tối đa 255 ký tự.',
            'a_content.required' => 'Trường này không được để trống.',
            'a_avatar.required' => 'Trường này không được để trống.',
        ];
    }
}
