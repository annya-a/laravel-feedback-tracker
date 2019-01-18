<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Votes\Http\Controllers\VotesController;
use Modules\Votes\Http\Controllers\VotersController;

Route::post('/posts/{post}/vote', [VotesController::class, 'vote'])->name('posts.vote');

Route::get('/posts/{post}/voters', [VotersController::class, 'index'])->name('posts.voters');
