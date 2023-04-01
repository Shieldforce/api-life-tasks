<?php

use App\Http\Controllers\Api\ChatController;
use Illuminate\Support\Facades\Route;

$model = "chat";
$class = ChatController::class;

Route::prefix("/{$model}")->name("api.{$model}.")->group(function () use ($model, $class) {

    Route::get("/", [ $class, "index" ])
        ->name("index")
        ->middleware("roles:all");

    Route::get("/{{$model}?}", [ $class, "show" ])
        ->name("show")
        ->middleware("roles:all");

    Route::post("/", [ $class, "store" ])
        ->name("store")
        ->middleware("roles:all");

    Route::put("/{{$model}?}", [ $class, "update" ])
        ->name("update")
        ->middleware("roles:all");

    Route::delete("/{{$model}?}", [ $class, "destroy" ])
        ->name("destroy")
        ->middleware("roles:all");

});
