<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TipoPedido;

class TiposPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        TipoPedido::create(['tipo' => 'Matricula']);
        TipoPedido::create(['tipo' => 'Emissao']);
        TipoPedido::create(['tipo' => 'Duplicado']);
        TipoPedido::create(['tipo' => 'Alteração de Características']);
    }
}
