<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'thumbnail',
        'author',
        'category',
        'link',
        'published_at'
    ];

    protected $with = ['author']; // Eager load the author relationship to avoid N+1 query problem

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(MediaCategory::class);
    }
}
