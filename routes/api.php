<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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

// Todos
Route::get('todos', [TodoController::class, 'all'])->name('todos.all');
Route::get('users/{user}/todos', [TodoController::class, 'index'])->name('users.todos.index');
Route::post('users/{user}/todos', [TodoController::class, 'store'])->name('users.todos.store');
Route::get('todos/{todo}', [TodoController::class, 'show'])->name('todos.show');
Route::put('todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
