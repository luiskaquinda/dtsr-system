<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@dtsr.ao',
                'password' => Hash::make('admin'),
            ]
        );

        User::create(
            [
                'name' => 'guest',
                'email' => 'guest@dtsr.ao',
                'password' => Hash::make('guest'),
            ]
        );

        User::create(
            [
                'name' => 'agente',
                'email' => 'agente@dtsr.ao',
                'password' => Hash::make('agente'),
            ]
        );
    }
}
