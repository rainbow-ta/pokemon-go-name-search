<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// TODO:名前をNameSearchなど適したものに変更する
class TagCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tagName' => 'required|max:30',
            // TODO:user_idをどの段階でチェックするか検討する必要あり
            // （ログインユーザーのidと一致するかチェックする）
            // 'user_id' => 'required|integer',
        ];
    }
}
