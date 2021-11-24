<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\Todo;
use App\Models\User;
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
    $usersQuantity = User::count();
    $postsQuantity = Post::count();
    $commentsQuantity = Comment::count();
    $todosQuantity = Todo::count();

    return Inertia::render('Welcome', [
        'canLogin'          => Route::has('login'),
        'canRegister'       => Route::has('register'),
        'laravelVersion'    => Application::VERSION,
        'phpVersion'        => PHP_VERSION,
        'usersQuantity'     => $usersQuantity,
        'postsQuantity'     => $postsQuantity,
        'commentsQuantity'  => $commentsQuantity,
        'todosQuantity'      => $todosQuantity,
        'url'               => route('welcome'),
    ]);
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
