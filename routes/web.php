<?php

use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Votes\VoteController;

// Posts.
Route::resource('/posts', PostController::class)->only([
    'index', 'show', 'store'
]);

Route::post('/posts/{post}/vote', [VoteController::class, 'vote'])->name('posts.vote');

// Comments.
Route::resource('/comments', CommentController::class)->only([
    'store', 'edit'
]);

// Authentication.
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
