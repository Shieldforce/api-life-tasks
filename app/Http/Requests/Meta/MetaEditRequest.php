<?php

namespace App\Http\Requests\Meta;

use Illuminate\Foundation\Http\FormRequest;

class MetaEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo'     => ["string"],
            'prazo'      => ["in:curto,médio,longo"],
            'aplicacao'  => ["in:profissional,pessoal"],
            'impacto'    => ["integer", "min:1", "max:100"],
            'descricao'  => ["string"],
            'concluida'  => ["integer", "min:1", "max:100"],
        ];
    }

    public function messages()
    {
        return [];
    }
}
