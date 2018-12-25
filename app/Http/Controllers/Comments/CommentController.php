<?php

namespace App\Http\Controllers\Comments;

use App\Domain\Comments\Services\CommentServiceContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Comment service.
     *
     * @var CommentServiceContract
     */
    protected $comment_service;

    /**
     * CommentController constructor.
     *
     * @param CommentServiceContract $commentService
     */
    public function __construct(CommentServiceContract $commentService)
    {
        $this->comment_service = $commentService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->only('text', 'post_id');
        $attributes['user_id'] = $request->user()->id;

        $this->comment_service->create($attributes);

        return redirect()->route('posts.show', ['post' => $request->post_id]);
    }
}
