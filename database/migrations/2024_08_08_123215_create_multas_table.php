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
            $table->string('codigomulta')->unique();
            $table->string('infracao_artigo');
            $table->text('descricao');
            $table->string('documento_apreendido')
                ->nullable()
                ->comment('Vai armazenar o tipo de documento apreendido, caso se tenha feito, durante a aplicação da multa');
            $table->foreignId('tipo_multa_id')
                ->constrained('tipos_multa')
                ->cascadeOnUpdate();
            $table->unsignedBigInteger('agente_id');
            $table->foreign('agente_id')
                ->references('id')
                ->on('agentes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('veiculo_id');
            $table->foreign('veiculo_id')
                ->references('id')
                ->on('veiculos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('proprietario_id');
            $table->foreign('proprietario_id')
                ->references('id')
                ->on('proprietarios')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->nullable();
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
