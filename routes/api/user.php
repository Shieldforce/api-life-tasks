<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

$model = "user";
$class = UserController::class;

Route::prefix("/{$model}")->name("api.{$model}.")->group(function () use ($model, $class) {

    Route::get("/", [ $class, "index" ])
        ->name("index")
        ->middleware("roles:SA");

    Route::get("/{{$model}?}", [ $class, "show" ])
        ->name("show")
        ->middleware("roles:SA");

    Route::post("/", [ $class, "store" ])
        ->name("store")
        ->middleware("roles:SA");

    Route::put("/{{$model}?}", [ $class, "update" ])
        ->name("update")
        ->middleware("roles:SA");

    Route::delete("/{{$model}?}", [ $class, "destroy" ])
        ->name("destroy")
        ->middleware("roles:SA");

});
