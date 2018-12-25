<?php

use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Comments\CommentController;

// Posts.
Route::resource('/posts', PostController::class)->only([
    'index', 'show', 'store'
]);

// Comments.
Route::resource('/comments', CommentController::class)->only([
    'store', 'edit'
]);
