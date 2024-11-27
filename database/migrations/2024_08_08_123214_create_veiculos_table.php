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
            $table->string('pais_origem');
            $table->unsignedBigInteger('matricula_id')
                ->nullable();
            $table->string('ano_fabrico');
            $table->date('primeiro_registro')
                ->nullable();
            $table->foreignId('combustivel_id')
                ->constrained('combustiveis');
            $table->foreignId('classe_id')
                ->constrained('classes_veiculos');
            $table->foreignId('caixa_id')
                ->constrained('caixas_veiculos')
                ->cascadeOnUpdate()
                ->onDelete('cascade');
            $table->foreignId('peso_id')
                ->constrained('pesos_bruto')
                ->cascadeOnUpdate()
                ->onDelete('cascade');
            $table->foreignId('servico_id')
                ->constrained('servicos');
            $table->foreignId('proprietario_id')
                ->constrained('proprietarios')
                ->cascadeOnUpdate()
                ->onDelete('cascade');
            $table->foreign('matricula_id')->references('id')->on('matriculas')->onDelete('cascade');
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
