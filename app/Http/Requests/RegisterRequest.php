<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'phone' => 'required|min:9|max:13|unique:users,phone, '.$this->id,
            'email' => 'required|unique:users,email, '.$this->id,
            'password' => 'required|min:6|max:18|same:password_comfirm',
            'password_comfirm' => 'required|min:6|max:18|same:password',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống.',
            'phone.required' => 'Trường này không được để trống.',
            'email.required' => 'Trường này không được để trống.',
            'password.required' => 'Trường này không được để trống.',
            'password_comfirm.required' => 'Trường này không được để trống.',
            'password_comfirm.same' => 'Mật khẩu không khớp.',
            'password.same' => 'Mật khẩu không khớp.',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự.',
            'password.max' => 'Mật khẩu tối đa 18 ký tự.',
            'password_comfirm.min' => 'Mật khẩu tối thiểu 6 ký tự.',
            'password_comfirm.max' => 'Mật khẩu tối đa 18 ký tự.',
            'name.max' => 'Họ tên tối đa 30 ký tự.',
            'phone.max' => 'Số điện thoại tối đa 13 ký tự.',
            'phone.min' => 'Số điện thoại thiểu 9 ký tự.',
            'phone.unique' => 'Số điện đã tồn tại.',
            'email.unique' => 'Email đã tồn tại.',
        ];
    }
}
