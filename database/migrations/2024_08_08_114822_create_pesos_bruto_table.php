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
        Schema::create('pesos_bruto', function (Blueprint $table) {
            $table->id();
            $table->decimal('a_frente', 10, 2);
            $table->decimal('ao_meio', 10, 2);
            $table->decimal('a_retaguarda', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesos_bruto');
    }
};
