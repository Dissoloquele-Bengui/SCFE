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
        Schema::create('atraso', function (Blueprint $table) {
            $table->id();
            $table->integer("it_id_tarefa_usuario");
            $table->integer("id_user");
            $table->integer("qtd_dias");
            $table->date("dt_data_atribuicao");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atraso');
    }
};
