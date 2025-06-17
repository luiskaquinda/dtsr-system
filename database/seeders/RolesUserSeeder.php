<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{
    Role,
    Ability,
    User
};

class RolesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $userRoot = User::where('name', 'root')->first(); 
        $roleRoot = Role::where('name', 'root')->first();

        $userAdmin = User::where('name', 'admin')->first(); 
        $roleAdmin = Role::where('name', 'admin')->first();

        $userAgente01 = User::where('name', 'agente01')->first(); 
        $roleAgente01 = Role::where('name', 'agente')->first();

        $userAgente02 = User::where('name', 'agente02')->first(); 
        $roleAgente02 = Role::where('name', 'agente')->first();

        $userGuest = User::where('name', 'guest')->first(); 
        $roleGuest = Role::where('name', 'guest')->first();

        $userRoot->roles()->attach($roleRoot);
        $userAdmin->roles()->attach($roleAdmin);
        $userAgente01->roles()->attach($roleAgente01);
        $userAgente02->roles()->attach($roleAgente02);
        $userGuest->roles()->attach($roleGuest);
    }
}
