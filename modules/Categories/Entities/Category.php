<?php

namespace Modules\Categories\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\Post;

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
