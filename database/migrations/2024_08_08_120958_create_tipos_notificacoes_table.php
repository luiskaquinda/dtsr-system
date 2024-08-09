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
        Schema::create('tipos_notificacoes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')
                ->comment('Uma notificação pode ser do tipo: 1. furto, 2. acidente, 3. roubo ou um outro tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_notificacoes');
    }
};
