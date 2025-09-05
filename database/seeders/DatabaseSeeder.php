<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MediaCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Malano Labilo',
            'username' => 'MalanoLabilo',
            'email' => 'mabilzak999@gmail.com',
            'password' => bcrypt('MalanoLabilo'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            CategorySeeder::class,
            MediaCategorySeeder::class,
            MediaSeeder::class,
            // WorkSeeder::class,
        ]);
    }
}
