<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Categories\Services\CategoryServiceContract;
use Modules\Posts\Services\PostCategoryServiceContract;

class CategoriesController extends Controller
{
    /**
     * Posts per page.
     */
    const POSTS_PER_PAGE = 10;

    /**
     * Category Service.
     *
     * @var CategoryServiceContract
     */
    protected $category_service;

    /**
     * Post Service.
     *
     * @var PostCategoryServiceContract
     */
    protected $post_category_service;

    /**
     * CategoryController constructor.
     * @param CategoryServiceContract $categoryService
     */
    public function __construct(CategoryServiceContract $categoryService, PostCategoryServiceContract $postCategoryService)
    {
        $this->category_service = $categoryService;
        $this->post_category_service = $postCategoryService;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = $this->category_service->findOrFail($id);
        $posts = $this->post_category_service
            ->with('user')
            ->withVotes()
            ->withUserVoter($request->user()->id)
            ->orderBy('created_at', 'desc')
            ->getPostsByCategoryPaginated($id, static::POSTS_PER_PAGE);

        return view('categories::show', compact('category', 'posts'));
    }
}
