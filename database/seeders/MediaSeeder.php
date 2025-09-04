<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::create([
            'title' => 'Sample Media Title',
            'slug' => 'sample-media-slug',
            'excerpt' => 'This is a sample excerpt for the media item.',
            'body' => 'This is a sample description for the media item.',
            'thumbnail' => 'img/default-thumbnail.jpg',
            'author_id' => 1,
            'category' => 'Tech',
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Another Media Title',
            'slug' => 'another-media-slug',
            'excerpt' => 'This is another sample excerpt for the media item.',
            'body' => 'This is another sample description for the media item.',
            'thumbnail' => 'img/user-avatar.png',
            'author_id' => 1,
            'category' => 'Lifestyle',
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Media Title',
            'slug' => 'third-media-slug',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category' => 'Health',
            'link' => null,
            'published_at' => now(),
        ]);
    }
}
