<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class ChatEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo'     => ["string"],
            'mensagem'   => ["string"],
        ];
    }

    public function messages()
    {
        return [];
    }
}
