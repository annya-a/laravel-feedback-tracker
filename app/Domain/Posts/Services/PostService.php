<?php

namespace App\Domain\Posts\Services;

use App\Core\Services\BasicService;
use App\Domain\Posts\Models\Post;
use App\Domain\Votes\HasVotes\HasVotesServiceTrait;
use App\Domain\Votes\HasVotes\HasVotesServiceContract;

class PostService extends BasicService implements PostServiceContract, HasVotesServiceContract
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
}
