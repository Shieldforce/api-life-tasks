<?php

use App\Http\Controllers\Api\TarefaController;
use Illuminate\Support\Facades\Route;

$model = "tarefa";
$class = TarefaController::class;

Route::prefix("/{$model}")->name("api.{$model}.")->group(function () use ($model, $class) {

    Route::get("/", [ $class, "index" ])
        ->name("index")
        ->middleware("roles:User");

    Route::get("/{tarefa}", [ $class, "show" ])
        ->name("show")
        ->middleware("roles:User");

    Route::post("/", [ $class, "store" ])
        ->name("store")
        ->middleware("roles:User");

    Route::put("/{tarefa}", [ $class, "update" ])
        ->name("update")
        ->middleware("roles:User");

    Route::delete("/{tarefa}", [ $class, "destroy" ])
        ->name("destroy")
        ->middleware("roles:User");

    Route::post("/checkMassive", [ $class, "checkMassive" ])
        ->name("checkMassive")
        ->middleware("roles:User");

    Route::post("/deleteMassive", [ $class, "deleteMassive" ])
        ->name("deleteMassive")
        ->middleware("roles:User");

});
