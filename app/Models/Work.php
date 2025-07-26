<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
    protected $fillable = ['title', 'slug', 'user_id', 'category_id', 'thumbnail', 'excerpt', 'link', 'has_page', 'description', 'published_at'];
    protected $casts = ['has_page' => 'boolean'];
    protected $with = ['user', 'category'];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);

    }
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    
    #[Scope]
    public function filter(Builder $query, array $filters): Builder{
        return $query->when($filters['searching'] ?? false, fn($query, $search) => $query->where('title', 'like', '%' . $search . '%'))->when($filters['category'] ?? false, fn($query, $category) =>$query->whereHas('category', fn($q) => $q->where('slug', $category)))->when($filters['creator'] ?? false, fn($query, $creator) =>$query->whereHas('user', fn($q) => $q->where('username', $creator)));
    }
    
}
