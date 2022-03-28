<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                's_title' => 'required'
            ];
        }
        else
        {
            return [
                's_title' => 'required',
                's_avatar' => 'required'           
            ];
        }
    }
    public function messages()
    {
        return [
            's_title.required' => 'Trường này không được để trống.',
            's_avatar.required' => 'Trường này không được để trống.',
        ];
    }
}
