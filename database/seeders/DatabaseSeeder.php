<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(EmpleadoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(TurnoSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
