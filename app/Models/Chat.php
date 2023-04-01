<?php

namespace App\Models;

use App\Observers\UserObserver;
use App\Scopes\UserScope;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    use Filterable;

    protected $table = "chat";

    protected $fillable = [
        "titulo",
        "mensagem",
        "user_id"
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(new UserObserver());
        //self::addGlobalScope(new UserScope());
    }

    /**
     * Relations
     */
    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function usersStatus()
    {
        return $this
            ->belongsToMany(
                "chat_status",
                "chat_id",
                "user_id",
            )->withPivot(["status", "chat_id", "user_id"]);
    }
}
