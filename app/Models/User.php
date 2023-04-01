<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Filterable;

    protected $fillable = [
        'name',
        'email',
        'picture',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relations
     */
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            "users_roles",
            "user_id",
            "role_id",
        )->withPivot(["id", "user_id", "role_id"]);
    }

    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, "email", "email");
    }

    /**
     * Relations
     */
    public function metas()
    {
        return $this->hasMany(Meta::class, "user_id", "id");
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, "user_id", "id");
    }

    public function usersStatus()
    {
        return $this
            ->belongsToMany(
                "chat_status",
                "user_id",
                "chat_id",
            )->withPivot(["status", "user_id", "chat_id"]);
    }

    /**
     * Mutators
     */

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => bcrypt($value),
            get: fn($value) => $value,
        );
    }

    protected function picture(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value,
            get: fn($value) => isset($value) ? env("APP_URL") . "/storage/" .$value :
                env("APP_URL") . "/img/avatar.png",
        );
    }
}
