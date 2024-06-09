<?php

namespace Database\Seeders;

use App\Models\Pengingat;
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
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            JabatanSeeder::class,
            UserSeeder::class,
            FooterSeeder::class,
            SlideSeeder::class,
            PengingatSeeder::class,
        ]);
    }
}
