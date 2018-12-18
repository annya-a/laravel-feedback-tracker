<?php

namespace App\Domain\Posts\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Categories\Models\Category;
use App\Domain\Users\Models\User;

class Post extends Model
{
    /**
     * Category ralation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * User relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
