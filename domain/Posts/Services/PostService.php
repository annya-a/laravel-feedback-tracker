<?php

namespace Domain\Posts\Services;

use Core\Services\BasicService;
use Domain\Posts\Models\Post;

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
