<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::simplePaginate(25),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'max:100', 'min:2'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => ['required', 'image'],
            'excerpt' => ['required', 'min:5'],
            'body' => ['required', 'min:5'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $post = Post::create($attributes);

        return redirect('/posts/' . $post->slug)->with('success', 'Your Post has been published.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required', 'max:100', 'min:2'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'thumbnail' => ['image'],
            'excerpt' => ['required', 'min:5'],
            'body' => ['required', 'min:5'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $post->update($attributes);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        return redirect('/posts/' . $post->slug)->with('success', 'Your Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Your Post has been deleted.');
    }
}
