<?php

use App\Http\Controllers\Posts\PostController;

/**
 * Features.
 */
Route::resource('/posts-requests', PostController::class);
