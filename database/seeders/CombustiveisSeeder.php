<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Combustivel;

class CombustiveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Combustivel::create(['combustivel' => 'Gasóleo']);
        Combustivel::create(['combustivel' => 'Gasolina']);
        Combustivel::create(['combustivel' => 'Outro']);
    }
}
