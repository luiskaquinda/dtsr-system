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
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('data_ocorrido');
            $table->time('hora_ocorrido');
            $table->string('codigoalerta')->unique();
            $table->boolean('anonima')->nullable();
            $table->string('nome_denuciante')->nullable();
            $table->text('descricao');
            $table->string('imagem')
                ->nullable();
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')
                ->references('id')
                ->on('municipios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('tipo_alerta_id');
            $table->foreign('tipo_alerta_id')
                ->references('id')
                ->on('tipos_notificacoes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('status')->default('aberto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertas');
    }
};
