<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MetaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'titulo'                    => $this->titulo,
            'prazo'                     => $this->prazo,
            'aplicacao'                 => $this->aplicacao,
            'impacto'                   => $this->impacto,
            'descricao'                 => $this->descricao,
            'concluida'                 => $this->concluida,
            'created_at'                => $this->created_at->diffForHumans(),
            'updated_at'                => $this->updated_at->diffForHumans(),
        ];
    }
}
