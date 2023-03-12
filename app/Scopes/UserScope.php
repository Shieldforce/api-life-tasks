<?php

namespace App\Scopes;

use App\Services\User\UnityMainId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class AddressScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if(Auth::check()) {
            return $builder
                ->where("unity_id", UnityMainId::get());
        }
    }
}
