<?php

namespace App\Domain\Posts\Services;

use App\Core\Services\BasicService;
use App\Domain\Posts\Models\Post;

class PostService extends BasicService implements PostServiceContract
{

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
