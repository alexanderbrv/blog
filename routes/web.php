<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
    return view('posts', [
        'posts'      => Post::latest()->get(),
        'categories' => Category::all(),
    ]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', compact('post'));
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts'           => $category->posts,
        'categories'      => Category::all(),
        'currentCategory' => $category,
    ]);
});

Route::get('/user/{author:username}', function (User $author) {
    return view('posts', [
        'posts'      => $author->posts,
        'categories' => Category::all(),
    ]);
});
