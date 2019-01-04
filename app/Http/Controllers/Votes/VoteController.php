<?php

namespace App\Http\Controllers\Votes;

use App\Domain\Posts\Models\Post;
use App\Http\Controllers\Controller;
use App\Domain\Votes\Services\VoteServiceContract;
use App\Http\Requests\Votes\VoteRequest;

class VoteController extends Controller
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
