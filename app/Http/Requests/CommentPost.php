<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentPost extends FormRequest
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

    public function rules()
    {
        $data = $this->all();
        // バリデーションの追加
        return [
            'comment' => 'required',
        ];
    }

    public function messages(){
        return [
            'comment.required' => '注意事項を変更する場合、入力は必須です。',
        ];
    }
}
