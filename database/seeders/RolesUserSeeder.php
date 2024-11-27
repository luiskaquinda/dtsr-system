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

        $user = User::where('name', 'root')->first(); 
        $role = Role::where('name', 'root')->first();

        $user->roles()->attach($role);
    }
}
