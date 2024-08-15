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
        Schema::create('multas', function (Blueprint $table) {
            $table->id();
            $table->string('importancia_pagar')->comment('
            Vai armazenar o valor a pagar ou a importância a pagar em UCF');
            $table->string('infracao_artigo');
            $table->string('documento_apreendido')
                ->nullable()
                ->comment('Vai armazenar o tipo de documento apreendido, caso se tenha feito, durante a aplicação da multa');
            $table->foreignId('tipo_multa_id')
                ->constrained('tipos_multa')
                ->cascadeOnUpdate();
            $table->foreignId('agente_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->foreignId('proprietario_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multas');
    }
};
