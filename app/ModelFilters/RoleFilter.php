<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class RoleFilter extends ModelFilter
{
    public $relations = [];

    protected $blacklist = [];

    public function name($name)
    {
        return $this->where('name', 'like', "%$name%");
    }
}
