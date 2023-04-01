<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ChatFilter extends ModelFilter
{
    public $relations = [];

    protected $blacklist = [];

    public function titulo($titulo)
    {
        return $this->where('titulo', 'like', "%$titulo%");
    }

    public function mensagem($mensagem)
    {
        return $this->where('mensagem', 'like', "%$mensagem%");
    }
}
