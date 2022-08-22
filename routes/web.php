<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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

    // Track Database queries
    // \Illuminate\Support\Facades\DBEvent::listen(function ($query)
    // {
    //     logger($query->sql, $query->bindings);
    // });

    return view('posts', [
        'posts' => Post::latest()->with('author', 'category')->get(), // ->with('','') will eager load data related to each post
        'categories' => Category::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']) // eager loading relationships on exsisting model
    ]);
});

Route::get('author/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author']) // eager loading relationships on exsisting model
    ]);
});
