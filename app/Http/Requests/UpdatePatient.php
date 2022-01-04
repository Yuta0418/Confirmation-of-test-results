<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use BenSampo\Enum\Traits\CastsEnums;
use BenSampo\Enum\Rules\EnumKey;
use BenSampo\Enum\Tests\Enums\Result;
use Illuminate\Support\Facades\Auth;

class UpdatePatient extends FormRequest
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
        $data = $this->all();
        // バリデーションの追加
        return [
            'name' => 'required|string|regex:/^[ァ-ヶー　]+$/u',
            'birthday'  => 'required|string|date_format:Y/m/d',
            'patient_id' => 'required|string|numeric:/^[0-9]+$/i',
            'results' => 'required',
        ];

    }
    public function messages(){
        return [
            'name.required' => '名前は必須です。',
            'name.regex' => 'カタカナで入力してください。スペースがある場合は全角で入力ください。',
            'birthday.string' => '生年月日は必須です。(year/month/dayの形で入力してください。）',
            'patient_id.numeric' => 'カルテ番号は必須です。半角数字で入力してください。',
            'results.required' => '検査結果は必須です。選択してください。',
        ];
    }
}

