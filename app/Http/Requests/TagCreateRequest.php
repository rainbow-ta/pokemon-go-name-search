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
            // TODO:255文字だと過剰なため、カラム定義から見直す
            'tagName' => 'required|max:255',
            // TODO:user_idをどの段階でチェックするか検討する必要あり
            // 'user_id' => 'required|integer',
        ];
    }
}
