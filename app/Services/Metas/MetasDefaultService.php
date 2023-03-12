<?php

namespace App\Services\Metas;

use App\Models\Meta;
use App\Models\User;

class MetasDefaultService
{
    public static function get(User $user)
    {
        $metas = [
            [
                "titulo"     => "Alimentação adequada",
                "prazo"      => "curto",
                "aplicacao"  => "pessoal",
                "impacto"    => 70,
                "descricao"  => "Se alimentar bem, com todos os nutrientes possíveis!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Corrida diária",
                "prazo"      => "curto",
                "aplicacao"  => "pessoal",
                "impacto"    => 70,
                "descricao"  => "Melhor para produtividade, saúde, bem estar, auto controle!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Tempo de qualidade com a familia",
                "prazo"      => "longo",
                "aplicacao"  => "pessoal",
                "impacto"    => 100,
                "descricao"  => "É qualidade de vida, passar um tempo de qualidade com a família!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Estudar melhores práticas na sua profissão!",
                "prazo"      => "longo",
                "aplicacao"  => "profissional",
                "impacto"    => 70,
                "descricao"  => "Se você quer ser uma pessoa com uma carreira promissora, se dedique aos estudos na sua área!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Estudo de especialidade na sua área!",
                "prazo"      => "longo",
                "aplicacao"  => "profissional",
                "impacto"    => 60,
                "descricao"  => "Se especializar sempre é uma boa opção, nas áreas especializadas geralmente a remuneração é maior!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Tente Meditar diáriamente!",
                "prazo"      => "longo",
                "aplicacao"  => "pessoal",
                "impacto"    => 100,
                "descricao"  => "Ao meditar você estará canalizando seu lado espiritual com sua estrutura física!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Respeite as pessoas!",
                "prazo"      => "longo",
                "aplicacao"  => "pessoal",
                "impacto"    => 100,
                "descricao"  => "Quando respeitamos o próximo, recebemos respeito em dobro!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Não deixe para amanhã, o que tem que ser feito hoje!",
                "prazo"      => "longo",
                "aplicacao"  => "pessoal",
                "impacto"    => 80,
                "descricao"  => "Procrastinação é uma forma de auto-sabotagem!!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
            [
                "titulo"     => "Sucesso é uma decisão!",
                "prazo"      => "longo",
                "aplicacao"  => "pessoal",
                "impacto"    => 100,
                "descricao"  => "Então decida ter sucesso, e lute pelo seu futuro!",
                "concluida"  => 0,
                "user_id"    => $user->id
            ],
        ];
        foreach ($metas as $meta) {
            Meta::updateOrCreate($meta, $meta);
        }
    }
}