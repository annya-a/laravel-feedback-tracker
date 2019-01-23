<?php

namespace Modules\Posts\Policies;

use Modules\Users\Entities\User;
use Modules\Posts\Entities\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can upvote for the post.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return mixed
     */
    public function vote(User $user, Post $post)
    {
        return $user->id !== $post->user->id;
    }
}

