<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->id();

            $table->string("titulo");
            $table->string("prazo");
            $table->string("aplicacao");
            $table->integer("impacto");
            $table->text("descricao");
            $table->integer("concluida");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metas');
    }
};
