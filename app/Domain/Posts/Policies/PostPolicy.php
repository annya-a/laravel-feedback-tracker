<?php

namespace App\Domain\Posts\Policies;

use App\Domain\Users\Models\User;
use App\Domain\Posts\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can post for the post.
     *
     * @param  \App\Domain\Users\Models\User  $user
     * @param  \App\Domain\Posts\Models\Post  $post
     * @return mixed
     */
    public function vote(User $user, Post $post)
    {
        return $user->id !== $post->user->id;
    }
}
