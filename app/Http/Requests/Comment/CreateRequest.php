<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'author' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Ваше имя не заполнено',
            'content.required' => 'Комментарий не заполнен',
        ];
    }
}
