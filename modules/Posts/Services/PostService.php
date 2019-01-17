<?php

namespace Modules\Posts\Services;

use App\Core\Services\BasicService;
use Modules\Posts\Entities\Post;
use Modules\Votes\HasVotes\HasVotesServiceTrait;

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
    public function getPostsByStatus($status, int $limit = 0) {
        $result = $this->builder->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        $this->resetBuilder();

        return $result;
    }
}