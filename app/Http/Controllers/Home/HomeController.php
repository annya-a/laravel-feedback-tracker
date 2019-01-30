<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Collection;
use Modules\Categories\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Posts\Entities\Post;
use Modules\Users\Entities\User;

class HomeController extends Controller
{
    /**
     * Number of post for each status.
     *
     * @var int
     */
    const POSTS_BY_STATUS_NUMBER = 6;

    /**
     * Home page.
     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        $categories = Category::withCount('posts')->orderBy('title')->get();

        $postsByStatus = $this->getPostsByStatuses();
        $userPostVotes = $request->user()->hasPostsVotes($postsByStatus->flatten());

        return view('home.index', compact('categories', 'postsByStatus', 'userPostVotes'));
    }

    /**
     * Get posts by statuses.
     */
    private function getPostsByStatuses()
    {
        $statuses = [Post::STATUS_PLANNED, Post::STATUS_IN_PROGRESS, Post::STATUS_COMPLETED];

        $posts = Collection::make();
        foreach ($statuses as $status) {
            $postsByStatus = Post::byStatus($status)
                ->with(['category', 'user'])
                ->withCount('votes')
                ->orderBy('created_at', 'desc')
                ->limit(static::POSTS_BY_STATUS_NUMBER)
                ->get();

            $posts->push($postsByStatus);
        }

        return $posts;
    }
}
