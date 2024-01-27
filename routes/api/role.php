<?php

use App\Http\Controllers\Api\RoleController;
use Illuminate\Support\Facades\Route;

$model = "role";
$class = RoleController::class;

Route::prefix("/{$model}")->name("api.{$model}.")->group(function () use ($model, $class) {

    Route::get("/", [ $class, "index" ])
        ->name("index");

    Route::get("/{role}", [ $class, "show" ])
        ->name("show");

    Route::post("/", [ $class, "store" ])
        ->name("store")
        ->middleware("roles:SA");

    Route::put("/{role}", [ $class, "update" ])
        ->name("update");

    Route::delete("/{role}", [ $class, "destroy" ])
        ->name("destroy");

});
