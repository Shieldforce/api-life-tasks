<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metas = [
            [
                "titulo"     => "Alimentação adequada",
                "prazo"      => "curto",
                "aplicacao"  => "pessoal",
                "impacto"    => 70,
                "descricao"  => "Se alimentar bem, com todos os nutrientes possíveis!",
                "concluida"  => 0
            ],
            [
                "titulo"     => "Organização da situação financeira!",
                "prazo"      => "médio",
                "aplicacao"  => "pessoal",
                "impacto"    => 90,
                "descricao"  => "Se Organizar financeiramente!!",
                "concluida"  => 0
            ],
            [
                "titulo"     => "Concluir Faculdade de AS!",
                "prazo"      => "longo",
                "aplicacao"  => "profissional",
                "impacto"    => 90,
                "descricao"  => "Concluir curso superior de AS, para a facilidade de novas oportunidades!!",
                "concluida"  => 0
            ],
            [
                "titulo"     => "Começar a falar inglês",
                "prazo"      => "longo",
                "aplicacao"  => "profissional",
                "impacto"    => 50,
                "descricao"  => "Para melhores oportunidades fora do Brasil!",
                "concluida"  => 0
            ],
            [
                "titulo"     => "Corrida diária",
                "prazo"      => "curto",
                "aplicacao"  => "pessoal",
                "impacto"    => 70,
                "descricao"  => "Melhor para produtividade, saúde, bem estar, auto controle!",
                "concluida"  => 0
            ]
        ];

        foreach ($metas as $meta) {
            Meta::updateOrCreate($meta, $meta);
        }
    }
}
