<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangepassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password_old' => 'required',
            'password' => 'required|min:6|max:18|same:password_comfirm',
            'password_comfirm' => 'required|min:6|max:18|same:password',
           
        ];
    }
    public function messages()
    {
        return [
            'password_old.required' => 'Trường này không được để trống.',
            'password.required' => 'Trường này không được để trống.',
            'password_comfirm.required' => 'Trường này không được để trống.',
            'password_comfirm.same' => 'Mật khẩu không khớp.',
            'password.same' => 'Mật khẩu không khớp.',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự.',
            'password.max' => 'Mật khẩu tối đa 18 ký tự.',
            'password_comfirm.min' => 'Mật khẩu tối thiểu 6 ký tự.',
            'password_comfirm.max' => 'Mật khẩu tối đa 18 ký tự.',
        ];
    }
}
