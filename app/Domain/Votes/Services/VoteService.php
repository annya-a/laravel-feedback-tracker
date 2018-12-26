<?php

namespace App\Domain\Votes\Services;

use App\Core\Services\BasicService;
use App\Domain\Votes\Models\Vote;

class VoteService extends BasicService implements VoteServiceContract
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    protected function model()
    {
        return Vote::class;
    }

    /**
     * Vote for post.
     *
     * @param int $post_id
     * @param int $user_id
     * @return mixed
     */
    public function vote(int $post_id, int $user_id)
    {
        $attributes = ['post_id' => $post_id, 'user_id' => $user_id];

        return $this->deleteOrCreate($attributes);
    }
}
