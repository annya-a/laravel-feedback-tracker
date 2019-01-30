<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Posts\Entities\Post;
use Modules\Posts\Http\Requests\PostStoreRequest;

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
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        $attributes = $request->only(['title', 'details', 'category_id']);
        $attributes['status'] = Post::STATUS_PLANNED;
        $attributes['user_id'] = $request->user()->id;

        Post::create($attributes);

        return redirect()->route('categories.show', ['category' => $request->category_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        // Load post data.
        $this->showLoad($post);

        $userPostVotes = $request->user()->hasPostsVotes(collect([$post]));

        // Get voters for post.
        $voters_left = $post->voters()->count() - static::VOTERS_NUMBER;

        return view('posts::show', compact('post', 'voters_left', 'userPostVotes'));
    }

    /**
     * Load data for show.
     * @param
     */
    private function showLoad(Post $post)
    {
        $post->load('user')
            ->load(['comments' => function(Relation $query) {
                $query->orderBy('created_at', 'desc')->with(['user', 'user.media']);
            }])
            ->load(['voters' => function(Relation $query) {
                $query->limit(static::VOTERS_NUMBER)->with('media');
            }])
            ->loadCount('votes');
    }
}
