<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            RegiaoSeeder::class,
            EstadoSeeder::class
        ]);

        \App\Models\Fornecedor::factory(50)
                ->hasProdutos(20)
                ->create();

        //User::factory(10)->hasPost(5)->hasCommets(10)(User)
    }
}
