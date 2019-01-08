<?php

namespace App\Http\Controllers\Home;

use App\Domain\Posts\Services\PostServiceContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Categories\Services\CategoryServiceContract;

class HomeController extends Controller
{
    /**
     * Items of categogories to show on main page.
     *
     * @var int
     */
    const CATEGORY_NUMBER = 10;

    /**
     * Number of post for each status.
     *
     * @var int
     */
    const POST_STATUS_NUMBER = 7;

    /**
     * Category Service.
     *
     * @var CategoryServiceContract
     */
    protected $category_service;

    /**
     * Post service.
     *
     * @var PostServiceContract
     */
    protected $post_service;


    /**
     * HomeController constructor.
     * @param CategoryServiceContract $serviceContract
     * @param PostServiceContract $postService
     */
    public function __construct(CategoryServiceContract $serviceContract, PostServiceContract $postService)
    {
        $this->category_service = $serviceContract;
        $this->post_service = $postService;
    }

    /**
     * Home page.
     *
     * @return string
     */
    public function index()
    {
        $categories = $this->category_service
            ->withCount('posts')
            ->limit(static::CATEGORY_NUMBER)
            ->get();

        $statuses = [
            PostServiceContract::STATUS_PLANNED,
            PostServiceContract::STATUS_IN_PROGRESS,
            PostServiceContract::STATUS_COMPLETED
        ];

        $postsByStatus = [];
        foreach ($statuses as $status) {
            $postsByStatus[$status] = $this->post_service->where('status', $status)
                ->with('category')
                ->withCount('votes')
                ->limit(static::POST_STATUS_NUMBER)
                ->get();
        }

        return view('home.index', compact('categories', 'postsByStatus'));
    }
}
