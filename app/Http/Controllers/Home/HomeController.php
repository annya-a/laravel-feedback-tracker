<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Categories\Services\CategoryServiceContract;

class HomeController extends Controller
{
    /**
     * Category Service.
     *
     * @var CategoryServiceContract
     */
    protected $category_service;

    /**
     * HomeController constructor.
     */
    public function __construct(CategoryServiceContract $serviceContract)
    {
        $this->category_service = $serviceContract;
    }

    /**
     * Items of categogories to show on main page.
     *
     * @var int
     */
    const CATEGORY_NUMBER = 10;

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

        return view('home.index', compact('categories'));
    }
}
