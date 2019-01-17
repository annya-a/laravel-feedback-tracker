<?php

namespace Modules\Comments\Services;


use App\Core\Services\BasicService;
use Modules\Comments\Entities\Comment;

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
