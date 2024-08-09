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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('quadro');
            $table->string('motor');
            $table->string('cor');
            $table->integer('numero_cilindros');
            $table->string('medidas_pneumaticas');
            $table->integer('lugares');
            $table->decimal('tara', 10, 2);
            $table->decimal('pais_origem');
            $table->string('matricula');
            $table->date('ano_fabrico');
            $table->date('primeiro_registro');
            $table->foreignId('combustivel_id')
                ->constrained('combustiveis')
                ->cascadeOnUpdate();
            $table->foreignId('classe_id')
                ->constrained('classes_veiculos')
                ->cascadeOnUpdate();
            $table->foreignId('caixa_id')
                ->constrained('caixas_veiculos')
                ->cascadeOnUpdate();
            $table->foreignId('peso_id')
                ->constrained('pesos_bruto')
                ->cascadeOnUpdate();
            $table->foreignId('servico_id')
                ->constrained('servicos')
                ->cascadeOnUpdate();
            $table->foreignId('proprietario_id')
                ->constrained('proprietarios')
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
