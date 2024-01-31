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
        Schema::create('categoria_tarefas', function (Blueprint $table) {
            $table->id();
            $table->date('dt_descricao');
            $table->string('vc_prioridade');
            $table->integer('it_tempo_estimado');
            $table->string('vc_tipo');
            $table->unsignedBigInteger('it_id_nome');
            $table->foreign('it_id_nome')-> references('id')->on('tarefas')->onDelete('cascade')->onUpdate('cascade');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_tarefas');


    }
};
