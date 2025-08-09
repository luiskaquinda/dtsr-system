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
        Schema::create('cartas_conducao', function (Blueprint $table) {
            $table->id();
            $table->string('numero_carta_conducao');
            $table->string('tipo_carta_conducao');
            $table->date('data_emissao_carta_conducao');
            $table->date('data_validade_carta_conducao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartas_conducao');
    }
};
