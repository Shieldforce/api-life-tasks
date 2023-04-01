<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_status', function (Blueprint $table) {
            $table->id();

            $table->string("status");

            $table->unsignedBigInteger("chat_id")->nullable();
            $table->foreign("chat_id")
                ->references("id")
                ->on("chat")
                ->onDelete("cascade");

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
        Schema::dropIfExists('chat_status');
    }
};
