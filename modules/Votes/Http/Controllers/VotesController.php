<?php

namespace Modules\Votes\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Votes\Http\Requests\Votes\VoteRequest;
use Modules\Posts\Entities\Post;
use Modules\Votes\Services\VoteService;

class VotesController extends Controller
{
    /**
     * Vote service.
     *
     * @var
     */
    protected $vote_service;

    /**
     * VoteController constructor.
     *
     * @param VoteService $voteService
     */
    public function __construct(VoteService $voteService)
    {
        $this->vote_service = $voteService;
    }

    /**
     * Vote for post.
     *
     * @param VoteRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function vote(VoteRequest $request, Post $post)
    {
        $this->vote_service->vote($post, $request->user());

        return back();
    }
}
