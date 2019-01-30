<?php

namespace Modules\Comments\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Comments\Entities\Comment;
use Modules\Comments\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
    /**
     * CommentController constructor.
     */
    public function __construct()
    {
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

        Comment::create($attributes);

        return redirect()->route('posts.show', ['post' => $request->post_id]);
    }
}
