<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => "UI UX",
            'slug' => Str::slug('ui ux'),
        ]);
        
        Category::create([
            'name' => "Frond End",
            'slug' => Str::slug('Frond End'),
        ]);

        Category::create([
            'name' => "Fullstack",
            'slug' => Str::slug('Fullstack'),
        ]);

        Category::create([
            'name' => "Backend",
            'slug' => Str::slug('Backend'),
        ]);

        Category::create([
            'name' => "Desain",
            'slug' => Str::slug('Desain'),
        ]);
    }
}
