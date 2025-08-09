<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Servico;

class ServicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Servico::create(['servico' => 'Particular']);
        Servico::create(['servico' => 'Oficial']);
        Servico::create(['servico' => 'Temporario']);
        Servico::create(['servico' => 'Diplomatico']);
        Servico::create(['servico' => 'Aluguer']);

    }
}
