<?php

namespace App\Domain\Categories\Models;

use App\Domain\Posts\Models\Post;
use Illuminate\Database\Eloquent\Model;

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
