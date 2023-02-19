<?php

use App\Http\Controllers\Api\RouteController;
use Illuminate\Support\Facades\Route;

$model = "route";
$class = RouteController::class;

Route::prefix("/{$model}")->name("api.{$model}.")->group(function () use ($model, $class) {

    Route::get("/", [ $class, "index" ])
        ->name("index")
        ->middleware("roles:SA");

});
