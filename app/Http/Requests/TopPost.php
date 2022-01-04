<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[ァ-ヶー　]+$/u',
            'birthday'  => 'required|string|date_format:Y/m/d',
            'patient_id' => 'required|string|numeric:/^[0-9]+$/i',
        ];
    }

    public function messages(){
        return [
            'name.regex' => '名前は必須です。カタカナで入力してください。',
            'birthday.date_format' => '生年月日は必須です。(year/month/dayの形で入力してください。）',
            'patient_id.required' => 'カルテ番号は必須です。半角数字で入力してください。',
            'birthday.required' => '生年月日は必須です。(year/month/dayの形で入力してください。）',
            'name.required' => '氏名は必須です。カタカナで入力してください。',
        ];
    }
}
