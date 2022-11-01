<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/podcasts/approval/{podcast}', [PodcastController::class, 'approval']);

Route::get('/podcasts/status/{status}', [PodcastController::class, 'showByStatus']);

Route::post('/podcasts/{podcast}', [PodcastController::class, 'update']);

Route::apiResource('podcasts', PodcastController::class);

Route::apiResource('comments', CommentController::class);