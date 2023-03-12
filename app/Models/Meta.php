<?php

namespace App\Models;

use App\Observers\UserObserver;
use App\Scopes\UserScope;
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
        "user_id"
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(new UserObserver());
        self::addGlobalScope(new UserScope());
    }

    /**
     * Relations
     */
    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
