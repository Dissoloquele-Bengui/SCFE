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
        Schema::create('frequencias', function (Blueprint $table) {
            $table->id();
            $table->date('dt_data');
            $table->time('tm_hora_entrada');
            $table->time('tm_hora_saida');
            $table->unsignedBigInteger('it_id_usuario');
            $table->foreign('it_id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->String('vc_tipo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequencias');
    }
};
