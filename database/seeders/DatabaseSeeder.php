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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@gmail.com',
        // ]);
        $this->call([
            AdminSeeder::class,
            CompanySeeder::class,
            JobPostSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
