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
        Schema::create('frequencia_numeracaos', function (Blueprint $table) {
            $table->id();
            $table->string('vc_frequencia')->nullable();
            $table->string('vc_numeracao')->nullable();
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
        Schema::dropIfExists('frequencia_numeracaos');
    }
};
