<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\MediaCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        MediaCategory::create([
            'name' => 'Music',
            'slug' => Str::slug('music')
        ]);
        MediaCategory::create([
            'name' => 'Art',
            'slug' => Str::slug('art')
        ]);
        MediaCategory::create([
            'name' => 'Education',
            'slug' => Str::slug('education')
        ]);
        MediaCategory::create([
            'name' => 'Politics',
            'slug' => Str::slug('politics')
        ]);
    }
}
