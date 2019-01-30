<?php

namespace Modules\Posts\Entities;

use Modules\Comments\Entities\Comment;
use Modules\Votes\HasVotes\HasVotesModelContract;
use Modules\Votes\HasVotes\HasVotesModelTrait;
use Illuminate\Database\Eloquent\Model;
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

    /**
     * Planned status.
     *
     * @var string.
     */
    const STATUS_PLANNED = 0;

    /**
     * In progress status.
     *
     * @var string.
     */
    const STATUS_IN_PROGRESS = 1;

    /**
     * In completed status.
     *
     * @var string.
     */
    const STATUS_COMPLETED = 2;

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

    /**
     * Scope a query to only include posts of a given status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Eager load relation counts on the model.
     *
     * @param  array|string  $relations
     * @return $this
     */
    public function loadCount($relations)
    {
        $relations = is_string($relations) ? func_get_args() : $relations;
        $this->newCollection([$this])->loadCount($relations);
        return $this;
    }
}
