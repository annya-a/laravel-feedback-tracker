<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\Posts\Entities\Post;

class CategoriesController extends Controller
{
    /**
     * Posts per page.
     */
    const POSTS_PER_PAGE = 10;

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        $posts = Post::with('user')
            ->withCount('votes')
            ->orderBy('created_at', 'desc')
            ->where('category_id', $category->id)
            ->paginate(static::POSTS_PER_PAGE);

        $userPostVotes = $request->user()->hasPostsVotes($posts->getCollection());

        return view('categories::show', compact('category', 'posts', 'userPostVotes'));
    }
}
