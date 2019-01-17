<?php

namespace Modules\Posts\Entities;

use Modules\Comments\Entities\Comment;
use Modules\Votes\HasVotes\HasVotesModelContract;
use Modules\Votes\HasVotes\HasVotesModelTrait;
use App\Core\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;
use Modules\Users\Entities\User;


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
class Post extends Model implements HasVotesModelContract
{
    use HasVotesModelTrait;

    protected $fillable = ['title', 'details', 'user_id', 'category_id', 'status'];

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
