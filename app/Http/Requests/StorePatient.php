<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use BenSampo\Enum\Rules\EnumKey;
use BenSampo\Enum\Traits\CastsEnums;

class StorePatient extends FormRequest
{
    public function getValidatorInstance()
    {
        if ($this->input('day') && $this->input('month') && $this->input('year'))
        {
            $birthDate = implode('/', $this->only(['year', 'month', 'day']));
            $this->merge([
                'birth' => $birthDate,
            ]);
        }

        return parent::getValidatorInstance();
    }

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
            'name.required' => '氏名は必須です。',
            'name.regex' => 'カタカナで入力してください。スペースがある場合は全角で入力ください。',
            'birthday.date_format' => '生年月日は必須です。(year/month/dayの形で入力してください。）',
            'patient_id.numeric' => 'カルテ番号は必須です。半角数字で入力してください。',
            'results.required' => '検査結果は必須です。選択してください。',
        ];
    }
}
