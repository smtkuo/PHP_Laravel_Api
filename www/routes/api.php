<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\StatsController;

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

// Posts
Route::resource('posts',PostController::class)->only([
    'index', 'show',  'store', 'update', 'destroy'
]);
Route::get('/posts/{postId}/{relationship}', [PostController::class, 'viewRelationship']);

// Category
Route::resource('category',CategoryController::class)->only([
    'index', 'show',  'store', 'update', 'destroy'
]);

// Images
Route::resource('images',ImagesController::class)->only([
    'index', 'show',  'store', 'update', 'destroy'
]);

// Stats
Route::resource('stats',StatsController::class)->only([
    'index'
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
