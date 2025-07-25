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
    public function filter(Builder $query, array $filters): void{
        //query untuk mencari berdasarkan title, jika ada filter searching, maka akan mencari berdasarkan title
        $query->when($filters['searching'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%');
        });
        //query untuk mengfilter category, jika ada filter category, maka akan mencari berdasarkan slug
        $query->when($filters['category']??false, function($query, $category){
            return $query->whereHas('category', function(Builder $query)use($category){
                return $query->where('slug', $category);
            });
        });

        //query untuk mengfilter creator, jika ada filter creator, maka akan mencari berdasarkan username
        $query->when($filters['creator'] ?? false, function($query, $creator){
            return $query->whereHas('user', function(Builder $query)  use ($creator){
                $query->where('username', $creator);
            } );
        });
    }
    
}
