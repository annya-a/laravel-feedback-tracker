<?php

namespace App\Domain\Posts\Models;

use App\Domain\Comments\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Categories\Models\Category;
use App\Domain\Users\Models\User;

/**
 * @property integer $id
 * @property string $title
 * @property string $details
 * @property User $user
 * @property Category $category
 * @property integer $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Post extends Model
{
    /**
     * Category relation.
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


    /**
     * Comments relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
