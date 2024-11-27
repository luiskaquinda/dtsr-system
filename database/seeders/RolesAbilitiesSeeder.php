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

        $rootRole = Role::where('name', 'root')->first(); $abilities = Ability::whereIn('name', ['create_post', 'cerate_user', 'edit_user', 'delete_user', 'login_page', 'edit_roles', 'edit_permission'])->get(); 
        
        
        foreach ($abilities as $ability) { 
            $rootRole->abilities()->attach($ability); 
        }
    }
}
