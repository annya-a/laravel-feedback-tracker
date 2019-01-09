<?php

namespace App\Domain\Posts\Services;

use App\Core\Services\BasicService;
use App\Domain\Posts\Models\Post;
use App\Domain\Votes\HasVotes\HasVotesServiceTrait;

class PostService extends BasicService implements PostServiceContract
{
    use HasVotesServiceTrait;

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Post::class;
    }

    /**
     * Get collection of posts by status.
     *
     * @param $status
     * @param int $limit
     * @return mixed
     */
    public function getListByStatus($status, int $limit = 0) {
        $result = $this->builder->where('status', $status)
            ->limit($limit)
            ->get();

        $this->resetBuilder();

        return $result;
    }
}
