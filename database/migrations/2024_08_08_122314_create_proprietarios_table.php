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
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('apelido_empresa')
                ->nullable();
            $table->date('data_nascimento');
            $table->char('sexo', 1)
                ->comment('Armazena o valor do genero equivalendo a: 
                    M -> Masculino
                    F -> Feminino
                ');
            $table->string('telemovel');
            $table->string('email');
            $table->foreignId('bilhete_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('residencia_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('carta_conducao_id')
                ->references('id')
                ->on('cartas_conducao')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietarios');
    }
};
