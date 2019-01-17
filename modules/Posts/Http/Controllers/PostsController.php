<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Posts\Http\Requests\PostStoreRequest;
use Modules\Posts\Services\PostServiceContract;

class PostsController extends Controller
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
    const VOTERS_NUMBER = 10;

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
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        $attributes = $request->only(['title', 'details', 'category_id']);
        $attributes['status'] = PostServiceContract::STATUS_PLANNED;
        $attributes['user_id'] = $request->user()->id;

        $this->post_service->create($attributes);

        return redirect()->route('categories.show', ['category' => $request->category_id]);
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
        $voters = $post->voters;
        $voters_left = $this->post_service->countVoters($id) - static::VOTERS_NUMBER;

        return view('posts::show', compact('post', 'voters', 'voters_left'));
    }

    /**
     * Load post which is suitable for show.
     *
     * @param $id
     * @return mixed
     */
    private function showLoadPost($id)
    {
        return $this->post_service->with(['user', 'comments', 'comments.user', 'comments.user.media', 'voters.media'])
            ->withLimit('voters', static::VOTERS_NUMBER)
            ->withVotes()
            ->findOrFail($id);
    }
}
