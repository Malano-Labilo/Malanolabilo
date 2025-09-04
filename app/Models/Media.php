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

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
