<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TipoNotificacao;

class TiposNotificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        TipoNotificacao::create(['tipo' => 'Furto']);
        TipoNotificacao::create(['tipo' => 'Acidente']);
        TipoNotificacao::create(['tipo' => 'Assalto']);
        TipoNotificacao::create(['tipo' => 'Roubo']);
        TipoNotificacao::create(['tipo' => 'Multa']);
        TipoNotificacao::create(['tipo' => 'Outro']);
    }
}
