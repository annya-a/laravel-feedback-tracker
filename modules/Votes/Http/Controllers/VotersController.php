<?php

namespace Modules\Votes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Posts\Services\PostServiceContract;

class VotersController extends Controller
{
    /**
     * Post service.
     *
     * @var PostServiceContract
     */
    protected $post_service;

    public function __construct(PostServiceContract $postService)
    {
        $this->post_service = $postService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($post_id)
    {
        $post = $this->post_service->with('voters')->findOrFail($post_id);

        return view('votes::voters.index', compact('post'));
    }
}
