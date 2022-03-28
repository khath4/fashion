<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'a_email' => 'required',
            'a_phone' => 'required',
            'a_address' => 'required',
            'time_open' => 'required',
            'a_description' => 'required',

           
        ];
    }
    public function messages()
    {
        return [
            'a_email.required' => 'Trường này không được để trống.',
            'a_phone.required' => 'Trường này không được để trống.',
            'a_address.required' => 'Trường này không được để trống.',
            'time_open.required' => 'Trường này không được để trống.',
            'a_description.required' => 'Trường này không được để trống.',
        ];
    }
}
