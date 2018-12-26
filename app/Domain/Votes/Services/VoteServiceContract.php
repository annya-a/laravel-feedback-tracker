<?php

namespace App\Domain\Votes\Services;

use App\Core\Services\BasicServiceContract;

interface VoteServiceContract extends BasicServiceContract
{
    /**
     * Vote for post.
     *
     * @param int $post_id
     * @param int $user_id
     * @return mixed
     */
    public function vote(int $post_id, int $user_id);
}
