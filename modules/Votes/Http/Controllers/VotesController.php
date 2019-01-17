<?php

namespace Modules\Votes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Votes\Services\VoteServiceContract;
use Modules\Votes\Http\Requests\Votes\VoteRequest;
use Modules\Posts\Entities\Post;

class VotesController extends Controller
{
    /**
     * Vote service.
     *
     * @var VoteServiceContract
     */
    protected $vote_service;

    /**
     * VoteController constructor.
     *
     * @param VoteServiceContract $voteService
     */
    public function __construct(VoteServiceContract $voteService)
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
        $this->vote_service->vote($post->id, $request->user()->id);

        return back();
    }
}
