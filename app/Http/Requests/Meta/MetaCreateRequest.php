<?php

namespace App\Http\Requests\Meta;

use Illuminate\Foundation\Http\FormRequest;

class MetaCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo'     => ["required"],
            'prazo'      => ["required", "in:curto,médio,longo"],
            'aplicacao'  => ["required", "in:profissional,pessoal"],
            'impacto'    => ["required", "integer", "min:1", "max:100"],
            'descricao'  => ["required"],
            'concluida'  => ["required", "integer", "min:1", "max:100"],
        ];
    }

    public function messages()
    {
        return [];
    }
}
