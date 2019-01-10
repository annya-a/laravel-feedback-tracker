<?php

use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Votes\VoteController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Categories\CategoryController;

// Posts.
Route::resource('/posts', PostController::class)->only([
    'index', 'show', 'store'
]);

Route::post('/posts/{post}/vote', [VoteController::class, 'vote'])->name('posts.vote');

// Comments.
Route::resource('/comments', CommentController::class)->only([
    'store', 'edit'
]);

// Comments.
Route::resource('/categories', CategoryController::class)->only([
    'show'
]);

// Homepage.
Route::get('/', [HomeController::class, 'index']);
