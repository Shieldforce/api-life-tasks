<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class ChatCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo'     => ["string", "required"],
            'mensagem'   => ["string", "required"],
        ];
    }

    public function messages()
    {
        return [];
    }

}
