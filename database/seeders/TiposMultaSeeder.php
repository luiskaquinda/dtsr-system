<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TipoMulta;

class TiposMultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        TipoMulta::create(['tipo' => 'Grave']);
        TipoMulta::create(['tipo' => 'Leve']);
        TipoMulta::create(['tipo' => 'Muito Grave']);
    }
}
