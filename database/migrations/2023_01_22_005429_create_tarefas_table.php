<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();

            $table->string("titulo");
            $table->string("prazo");
            $table->string("aplicacao");
            $table->integer("impacto");
            $table->text("descricao");
            $table->integer("concluida");

            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
};
