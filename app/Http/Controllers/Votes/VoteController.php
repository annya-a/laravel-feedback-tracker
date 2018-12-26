<?php

namespace App\Http\Controllers\Votes;

use Illuminate\Http\Request;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vote(VoteRequest $request)
    {
        $this->vote_service->vote($request->post_id, $request->user()->id);

        return back();
    }
}
