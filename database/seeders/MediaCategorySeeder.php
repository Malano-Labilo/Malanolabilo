<?php

namespace Database\Seeders;

use App\Models\MediaCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        MediaCategory::create([
            'name' => 'Music',
            'slug' => 'music'
        ]);
        MediaCategory::create([
            'name' => 'Art',
            'slug' => 'art'
        ]);
        MediaCategory::create([
            'name' => 'Education',
            'slug' => 'education'
        ]);
        MediaCategory::create([
            'name' => 'Politics',
            'slug' => 'politics'
        ]);
    }
}
