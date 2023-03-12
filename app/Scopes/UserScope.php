<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class UserScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if(Auth::check() && !app()->runningInConsole()) {
            return $builder
                ->whereNull("user_id")
                ->orWhere("user_id", Auth::id());
        }
    }
}
