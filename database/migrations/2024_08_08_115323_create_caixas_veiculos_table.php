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
        Schema::create('caixas_veiculos', function (Blueprint $table) {
            $table->id();
            $table->decimal('distancia_entre_eixos', 10, 2);
            $table->decimal('altura', 10, 2);
            $table->string('tipo_caixa')
                ->comment('Este campo vai armazenar o tipo de carroçaria que o caro tem, aberta, fechada, descapotavle, etc...');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caixas_veiculos');
    }
};
