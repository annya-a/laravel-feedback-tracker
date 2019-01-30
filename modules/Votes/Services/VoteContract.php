<?php

namespace Modules\Votes\Services;

use Modules\Posts\Entities\Post;
use Modules\Users\Entities\User;

interface VoteContract
{
    /**
     * Vote for post.
     *
     * @param Post $post
     * @param User $user
     * @return mixed
     */
    public function vote(Post $post, User $user);
}
