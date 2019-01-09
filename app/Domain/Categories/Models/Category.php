<?php

namespace App\Domain\Categories\Models;

use App\Core\Database\Eloquent\Model;
use App\Domain\Posts\Models\Post;

class Category extends Model
{
    /**
     * Relations with post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
