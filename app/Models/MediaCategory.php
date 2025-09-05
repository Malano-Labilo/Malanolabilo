<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MediaCategory extends Model
{

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
