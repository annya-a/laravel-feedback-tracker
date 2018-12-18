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
    public function index()
    {
        $posts = $this->post_service->paginate(self::ITEMS_PER_PAGE);

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
        //
    }
}
