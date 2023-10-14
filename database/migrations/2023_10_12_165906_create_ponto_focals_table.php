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
        Schema::create('ponto_focals', function (Blueprint $table) {
            $table->id();
            $table->string('vc_pNome');
            $table->string('vc_nomeMeio');
            $table->string('vc_uNome');
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
        Schema::dropIfExists('ponto_focals');
    }
};
