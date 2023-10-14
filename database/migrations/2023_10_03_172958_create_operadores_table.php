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
        Schema::create('operadores', function (Blueprint $table) {
            $table->id();
            $table->string('vc_nome');
            $table->string('vc_nif');
            $table->year('yr_ano_fundacao');
            $table->string('vc_zona_geografica_actuacao')->nullable();
            $table->string('vc_tecnologia_usada')->nullable();
            $table->string('vc_site_oficial')->nullable();
            $table->integer('it_estado')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operadores');
    }
};
