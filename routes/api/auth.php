<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


$model = "auth";
$class = AuthController::class;

Route::prefix("/{$model}")->name("api.{$model}.")->group(function () use ($model, $class) {

    Route::get("/setupRoutes", [ $class, "setupRoutes" ])
        ->name("setupRoutes")
        ->middleware("roles:SA");

    Route::get("/verifyToken", [ $class, "verifyToken" ])
        ->name("verifyToken")
        ->middleware("roles:all");

    Route::post("/logout", [ $class, "logout" ])
        ->name("logout")
        ->middleware("roles:all");

});


