<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ct_name' => 'required',
            'ct_phone' => 'required',
            'ct_title' => 'required',
            'ct_email' => 'required',
            'ct_content' => 'required',
           
        ];
    }
    public function messages()
    {
        return [
            'ct_name.required' => 'Trường này không được để trống.',
            'ct_phone.required' => 'Trường này không được để trống.',
            'ct_title.required' => 'Trường này không được để trống.',
            'ct_email.required' => 'Trường này không được để trống.',
            'ct_content.required' => 'Trường này không được để trống.',
        ];
    }
}
