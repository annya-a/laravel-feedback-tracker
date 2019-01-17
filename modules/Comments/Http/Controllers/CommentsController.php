<?php

namespace Modules\Comments\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Comments\Services\CommentServiceContract;
use Modules\Comments\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
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
        $this->middleware('auth')->only('store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request)
    {
        $attributes = $request->only('text', 'post_id');
        $attributes['user_id'] = $request->user()->id;

        $this->comment_service->create($attributes);

        return redirect()->route('posts.show', ['post' => $request->post_id]);
    }
}
