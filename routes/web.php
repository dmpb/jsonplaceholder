<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Users
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

// Posts
Route::get('posts', [PostController::class, 'all'])->name('posts.all');
Route::get('users/{user}/posts', [PostController::class, 'index'])->name('users.posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Comments
Route::get('comments', [CommentController::class, 'all'])->name('comments.all');
Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('posts.comments.index');
Route::get('comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
