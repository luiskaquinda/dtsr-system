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
        Schema::create('veiculos_notificacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('veiculo_id')
                ->constrained('veiculos')
                ->cascadeOnUpdate();
            $table->foreignId('notificacao_id')
                ->constrained('notificacoes')
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos_notificacoes');
    }
};
