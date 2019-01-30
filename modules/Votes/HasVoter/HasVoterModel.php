<?php

namespace Modules\Votes\HasVoter;

use Illuminate\Support\Collection;
use Modules\Posts\Entities\Post;
use Modules\Votes\Entities\Vote;

trait HasVoterModel
{
    /**
     * Model vote relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function postVotes()
    {
        return $this->hasManyThrough(Post::class, Vote::class, 'user_id', 'id', 'id', 'post_id');
    }

    /**
     * Check if user has votes for specific posts.
     * @param Collection $posts
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function hasPostsVotes(Collection $posts)
    {
        return $this->postVotes()->whereIn('post_id', $posts->pluck('id'))->get();
    }
}
