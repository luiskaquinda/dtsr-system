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
        Schema::create('pedidos_matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('status')
                ->comment('Vai armazenar o status do pedido, se foi aceite ou não');
            $table->text('descricao');
            $table->foreignId('tipo_pedido_id')
                ->constrained('tipos_pedido')
                ->cascadeOnUpdate();
            $table->foreignId('veiculo_id')
                ->constrained('veiculos')
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
        Schema::dropIfExists('pedidos_matriculas');
    }
};
