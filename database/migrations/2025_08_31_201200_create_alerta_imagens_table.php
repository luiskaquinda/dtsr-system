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
        Schema::create('alerta_imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alerta_id')->nullable();
            $table->unsignedBigInteger('veiculo_id')->nullable();
            $table->string('path'); // caminho relativo no disco (ex: alertas/arquivo.jpg)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alerta_imagens', function (Blueprint $table) {
            $table->unsignedBigInteger('alerta_id')->nullable(false)->change();
            $table->unsignedBigInteger('veiculo_id')->nullable(false)->change();
            $table->dropIndex(['alerta_id']);
            $table->dropIndex(['veiculo_id']);
        });
    }
};
