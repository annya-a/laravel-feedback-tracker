<?php

namespace App\Http\Controllers\Home;

use Modules\Posts\Services\PostServiceContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Categories\Services\CategoryServiceContract;

class HomeController extends Controller
{
    /**
     * Number of post for each status.
     *
     * @var int
     */
    const POSTS_BY_STATUS_NUMBER = 6;

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
     *
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
    public function index(Request $request)
    {
        $categories = $this->category_service->withCount('posts')
            ->getCategories();

        $postsByStatus = $this->getPostsByStatuses($request->user());

        return view('home.index', compact('categories', 'postsByStatus'));
    }

    /**
     * Get posts by statuses.
     */
    private function getPostsByStatuses($user)
    {
        $statuses = [
            PostServiceContract::STATUS_PLANNED,
            PostServiceContract::STATUS_IN_PROGRESS,
            PostServiceContract::STATUS_COMPLETED
        ];

        $posts = [];
        foreach ($statuses as $status) {
            $listByStatus = $this->post_service->with(['category', 'user'])
                ->withUserVoter($user->id)
                ->withVotes()
                ->getPostsByStatus($status, static::POSTS_BY_STATUS_NUMBER);

            $posts[$status] = $listByStatus;
        }

        return $posts;
    }
}
