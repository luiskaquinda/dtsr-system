<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{
    Dtsr,
    Agente
};

class DtsrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $dtsr = Dtsr::create([
            'nome_dtsr' => 'Dtsr-Benguela', 
            'telefone' => '+244 939 434 550',
            'email' => 'dtsr.benguela@dtsr.ao',
            'municipio_id' => 9,
        ]);

        Agente::create([
            'nome' => 'agente001', 
            'patente' => 'Oficial de 1ª',
            'numero' => '001ADTSR',
            'dtsr_id' => $dtsr->id,
            'user_id' => 3,
        ]);

        Agente::create([
            'nome' => 'agente002', 
            'patente' => 'Oficial de 2ª',
            'numero' => '002ADTSR',
            'dtsr_id' => $dtsr->id,
            'user_id' => 4,
        ]);

    }
}
