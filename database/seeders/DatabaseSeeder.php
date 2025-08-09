<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(
            [
                UsersSeeder::class,
                ProvinciasMunicipiosSeeder::class,
                ServicosSeeder::class,
                TiposPedidosSeeder::class,
                CombustiveisSeeder::class,
                ClassesVeiculoSeeder::class,
                TiposMultaSeeder::class,
                TiposNotificacaoSeeder::class,
                RolesSeeder::class,
                AbilitiesSeeder::class,
                RolesAbilitiesSeeder::class,
                RolesUserSeeder::class,
                DtsrSeeder::class
            ]
        );
    }
}
