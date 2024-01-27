<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

$model = "user";
$class = UserController::class;

Route::prefix("/{$model}")->name("api.{$model}.")->group(function () use ($model, $class) {

    Route::get("/", [ $class, "index" ])
        ->name("index")
        ->middleware("roles:SA");

    Route::get("/{user}", [ $class, "show" ])
        ->name("show")
        ->middleware("roles:SA");

    Route::post("/", [ $class, "store" ])
        ->name("store")
        ->middleware("roles:SA");

    Route::put("/{user}", [ $class, "update" ])
        ->name("update")
        ->middleware("roles:SA");

    Route::post("/savePicture", [ $class, "savePicture" ])
        ->name("savePicture")
        ->middleware("roles:all");

    Route::delete("/{user}", [ $class, "destroy" ])
        ->name("destroy")
        ->middleware("roles:SA");

});
