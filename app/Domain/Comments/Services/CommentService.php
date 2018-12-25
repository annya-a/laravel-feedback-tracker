<?php

namespace App\Domain\Comments\Services;


use App\Core\Services\BasicService;
use App\Domain\Comments\Models\Comment;

class CommentService extends BasicService implements CommentServiceContract
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    protected function model()
    {
        return Comment::class;
    }
}
