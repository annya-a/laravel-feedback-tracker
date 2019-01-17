<?php

use App\Http\Controllers\Home\HomeController;

// Homepage.
Route::get('/', [HomeController::class, 'index']);
