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
                'name' => 'agente01',
                'email' => 'agente01@dtsr.ao',
                'password' => Hash::make('agente'),
            ]
        );

        User::create(
            [
                'name' => 'agente02',
                'email' => 'agente02@dtsr.ao',
                'password' => Hash::make('agente'),
            ]
        );

        User::create(
            [
                'name' => 'root',
                'email' => 'root@monarquia.code',
                'password' => Hash::make('root'),
            ]
        );
    }
}
