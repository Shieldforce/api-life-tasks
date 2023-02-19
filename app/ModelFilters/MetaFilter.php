<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class MetaFilter extends ModelFilter
{
    public $relations = [];

    protected $blacklist = [];

    public function titulo($titulo)
    {
        return $this->where('titulo', 'like', "%$titulo%");
    }

    public function prazo($prazo)
    {
        return $this->where('prazo', 'like', "%$prazo%");
    }

    public function aplicacao($aplicacao)
    {
        return $this->where('aplicacao', 'like', "%$aplicacao%");
    }

    public function impacto($impacto)
    {
        return $this->where('impacto', $impacto);
    }

    public function descricao($descricao)
    {
        return $this->where('descricao', 'like', "%$descricao%");
    }

    public function concluida($concluida)
    {
        return $this->where('concluida',$concluida);
    }
}
