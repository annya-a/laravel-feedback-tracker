<?php

namespace App\Http\Controllers\Categories;

use App\Domain\Categories\Services\CategoryServiceContract;
use App\Domain\Posts\Services\PostCategoryServiceContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
    public function show($id)
    {
        $category = $this->category_service->findOrFail($id);
        $posts = $this->post_category_service->withCount('votes')->getPostsByCategoryPaginated($id, static::POSTS_PER_PAGE);

        return view('categories.show', compact('category', 'posts'));
    }
}
