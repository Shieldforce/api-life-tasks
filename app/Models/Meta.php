<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{

    use Filterable;

    protected  $fillable = [
        "titulo",
        "prazo",
        "aplicacao",
        "impacto",
        "descricao",
        "concluida",
    ];
}
