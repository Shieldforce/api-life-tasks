<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    public function saving(Model $model)
    {
        if(Auth::check() && !app()->runningInConsole()) {
            $model->user_id = Auth::id();
        }
    }
}
