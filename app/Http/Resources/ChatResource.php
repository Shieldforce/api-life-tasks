<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'titulo'     => $this->titulo,
            'mensagem'   => $this->mensagem,
            'user'       => $this->user,
            'user_id'    => $this->user_id,
            'descricao'  => $this->descricao,
            'created_at' => isset($this->created_at) ? $this->created_at->diffForHumans() : "-",
            'updated_at' => isset($this->updated_at) ? $this->updated_at->diffForHumans() : "-",
        ];
    }
}
