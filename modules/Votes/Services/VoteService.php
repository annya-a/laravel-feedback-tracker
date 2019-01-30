<?php

namespace Modules\Votes\Services;

use Modules\Posts\Entities\Post;
use Modules\Users\Entities\User;
use Modules\Votes\Entities\Vote;

class VoteService implements VoteContract
{
    /**
     * Vote for post.
     *
     * @param Post $post
     * @param User $user
     * @return mixed
     */
    public function vote(Post $post, User $user)
    {
        $attributes = ['post_id' => $post->id, 'user_id' => $user->id];

        return Vote::deleteOrCreate($attributes);
    }
}
