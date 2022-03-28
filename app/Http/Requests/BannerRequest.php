<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                'banner_type' => 'required'
            ];
        }
        else
        {
            return [
                'banner_type' => 'required',
                'banner_avatar' => 'required'           
            ];
        }
    }
    public function messages()
    {
        return [
            'banner_type.required' => 'Trường này không được để trống.',
            'banner_avatar.required' => 'Trường này không được để trống.',
        ];
    }
}
