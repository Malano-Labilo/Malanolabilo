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

        User::factory()->create([
            'name' => 'Malano Labilo',
            'username' => 'MalanoLabilo',
            'email' => 'mabilzak999@gmail.com',
            'password' => bcrypt('MalanoLabilo.k4kb1l.;'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            CategorySeeder::class,
            WorkSeeder::class,
        ]);
    }
}
