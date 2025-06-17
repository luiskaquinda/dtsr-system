<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{
    Role,
    Ability
};

class RolesAbilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $rootRole = Role::where('name', 'root')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $guestRole = Role::where('name', 'guest')->first();
        $agente01Role = Role::where('name', 'agente')->first(); 
        
        // Root 

        $abilitiesRoot = Ability::whereIn('name', ['create_post', 'cerate_user', 'edit_user', 'delete_user', 'login_page', 'edit_roles', 'edit_permission'])->get(); 

        // Admin
        
        $abilitiesAdmin = Ability::whereIn('name', [	
            'create_post', 
            'login_page,', 
            'ver_pedidos', 
            'ver_veiculos', 
            'ver_pedido', 
            'atribuir_matricula', 
            'notificar_proprietario', 
            'pesquisar_veiculo'
        ])->get();

        // Guest
        
        $abilitiesGuest = Ability::whereIn('name', [	
            'ver_veiculos', 
            'ver_pedido', 
            'ver_pedidos', 
            'registar_pedido'
        ])->get();
        
        // Agente
        
        $abilitiesAgente01 = Ability::whereIn('name', [	
            'create_post', 
            'cerate_user', 
            'login_page', 
            'ver_pedidos', 
            'ver_veiculos', 
            'ver_pedido', 
            'notificar_proprietario', 
            'registar_pedido',
            'pesquisar_veiculo', 
            'atribuir_multa'
        ])->get();

        $abilitiesAgente02 = Ability::whereIn('name', [	
            'create_post', 
            'cerate_user', 
            'login_page', 
            'ver_pedidos', 
            'ver_veiculos', 
            'ver_pedido', 
            'notificar_proprietario', 
            'registar_pedido',
            'pesquisar_veiculo', 
            'atribuir_multa'
        ])->get();
        
        
        
        foreach ($abilitiesRoot as $ability) { 
            $rootRole->abilities()->attach($ability); 
        }

        foreach ($abilitiesAdmin as $ability) { 
            $adminRole->abilities()->attach($ability); 
        }

        foreach ($abilitiesGuest as $ability) { 
            $guestRole->abilities()->attach($ability); 
        }

        foreach ($abilitiesAgente01 as $ability) { 
            $agente01Role->abilities()->attach($ability); 
        }
    }
}
