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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('tipo_documento');
            $table->foreignId('pedido_matricula_id')
                ->nullable()        
                ->constrained('pedidos_matriculas')
                ->cascadeOnUpdate()
                ->onDelete('cascade');
            $table->foreignId('multa_id')
                ->nullable()
                ->constrained('multas')
                ->cascadeOnUpdate()
                ->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
