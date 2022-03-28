<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'phone' => 'required|min:9|max:13',
            'phone' => 'required|unique:users,phone, '.get_data_user('web'),
            'email' => 'required|unique:users,email, '.get_data_user('web'),
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống.',
            'phone.required' => 'Trường này không được để trống.',
            'email.required' => 'Trường này không được để trống.',
            'name.max' => 'Họ tên tối đa 30 ký tự.',
            'phone.max' => 'Số điện thoại tối đa 13 ký tự.',
            'phone.min' => 'Số điện thoại thiểu 9 ký tự.',
            'phone.unique' => 'Số điện đã tồn tại.',
            'email.unique' => 'Email đã tồn tại.',
        ];
    }
}
