<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ability;
class AbilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ability::create(['name' => 'create_post']);
        Ability::create(['name' => 'cerate_user']);
        Ability::create(['name' => 'edit_user']);
        Ability::create(['name' => 'delete_user']);
        Ability::create(['name' => 'login_page']);
        Ability::create(['name' => 'edit_roles']);
        Ability::create(['name' => 'edit_permission']);
        Ability::create(['name' => 'editar_pedido']);
        Ability::create(['name' => 'deletar_pedido']);
        Ability::create(['name' => 'ver_pedidos']);
        Ability::create(['name' => 'ver_veiculos']);
        Ability::create(['name' => 'ver_pedido']);
        Ability::create(['name' => 'atribuir_matricula']);
        Ability::create(['name' => 'notificar_proprietario']);
        Ability::create(['name' => 'aprovar_pedido']);
        Ability::create(['name' => 'registar_pedido']);
        Ability::create(['name' => 'pesquisar_veiculo'] );
        
        // Ability::create([
        //     ['name' => 'create_post'],
        //     ['name' => 'cerate_user'],
        //     ['name' => 'edit_user'],
        //     ['name' => 'delete_user'],
        //     ['name' => 'login_page'],
        //     ['name' => 'edit_roles'],
        //     ['name' => 'edit_permission'],
        //     ['name' => 'editar_pedido'],
        //     ['name' => 'deletar_pedido'],
        //     ['name' => 'ver_pedidos'],
        //     ['name' => 'ver_veiculos'],
        //     ['name' => 'ver_pedido'],
        //     ['name' => 'atribuir_matricula'],
        //     ['name' => 'notificar_proprietario'],
        //     ['name' => 'aprovar_pedido'],
        //     ['name' => 'registar_pedido'],
        //     ['name' => 'pesquisar_veiculo'] 
        // ]);
    }
}
