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
            'category_id' => 1,
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
            'category_id' => 3,
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
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Media Title XXX1',
            'slug' => 'third-media-slugxxx',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medqqqia Title',
            'slug' => 'third-mediqqqqa-slug',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title',
            'slug' => 'third-mediaooo-slug',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);

        Media::create([
            'title' => 'Third Medioooa Title1',
            'slug' => 'third-mediaooo-slug1',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title2',
            'slug' => 'third-mediaooo-slug2',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title3',
            'slug' => 'third-mediaooo-slug3',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title4',
            'slug' => 'third-mediaooo-slug4',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title5',
            'slug' => 'third-mediaooo-slug5',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa 6',
            'slug' => 'third-mediaooo-slug6',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title7',
            'slug' => 'third-mediaooo-slug7',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title8',
            'slug' => 'third-mediaooo-slug8',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title9',
            'slug' => 'third-mediaooo-slug9',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
        Media::create([
            'title' => 'Third Medioooa Title10',
            'slug' => 'third-mediaooo-slug10',
            'excerpt' => 'This is the third sample excerpt for the media item.',
            'body' => 'This is the third sample description for the media item.',
            'thumbnail' => 'img/default-landscape.jpg',
            'author_id' => 1,
            'category_id' => 4,
            'link' => null,
            'published_at' => now(),
        ]);
    }
}
