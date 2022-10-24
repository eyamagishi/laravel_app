<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 修正
        // ここがfalseのままだと全てのリクエストを受け付けなくなってしまうので注意
        return true;
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // バリデーションルール
    {
        return [
            'content' => 'required|max:255',
        ];
    }
}
