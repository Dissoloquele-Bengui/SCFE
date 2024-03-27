<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefa_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('it_id_usuario');
            $table->foreign('it_id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('it_id_tarefa');
            $table->foreign('it_id_tarefa')->references('id')->on('tarefas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa_user');
    }
};
