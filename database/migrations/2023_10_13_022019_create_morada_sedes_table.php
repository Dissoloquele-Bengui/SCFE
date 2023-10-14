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
        Schema::create('morada_sedes', function (Blueprint $table) {
            $table->id();
            $table->string('vc_rua');
            $table->string('vc_provincia');
            $table->string('vc_municipio');
            $table->string('vc_bairro');
            $table->string('vc_complemento');
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
        Schema::dropIfExists('morada_sedes');
    }
};
