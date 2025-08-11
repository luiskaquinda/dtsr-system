<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ClasseVeiculo;

class ClassesVeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        ClasseVeiculo::create(['classe' => 'Motocilo']);
        ClasseVeiculo::create(['classe' => 'Ligeiro Pessoas']);
        ClasseVeiculo::create(['classe' => 'Ligeiro Mercadorias']);
        ClasseVeiculo::create(['classe' => 'Pesado Pessoas']);
        ClasseVeiculo::create(['classe' => 'Pesado Mercadorias']);
        ClasseVeiculo::create(['classe' => 'Especiais']);
    }
}
