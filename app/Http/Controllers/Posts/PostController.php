<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Posts\Services\PostServiceContract;

class PostController extends Controller
{
    /**
     * Items per page.
     *
     * @var integer
     */
    const ITEMS_PER_PAGE = 10;

    /**
     * Voters amount to show,
     */
    const VOTERS_AMOUNT = 10;

    /**
     * Post service.
     *
     * @var PostServiceContract
     */
    protected $post_service;

    /**
     * PostController constructor.
     *
     * @param PostServiceContract $postService
     */
    public function __construct(PostServiceContract $postService)
    {
        $this->post_service = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id)
    {
        $posts = $this->post_service->with(['category'])
            ->paginate(self::ITEMS_PER_PAGE);

        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get post.
        $post = $this->showLoadPost($id);

        // Get voters for post.
        $voters = $this->post_service->getVoters($id);

        return view('posts.show', compact('post', 'voters'));
    }

    /**
     * Load post which is suitable for show.
     *
     * @param $id
     * @return mixed
     */
    private function showLoadPost($id)
    {
        return $this->post_service->with(['user', 'comments', 'comments.user'])
            ->withVotes()
            ->findOrFail($id);
    }
}
