<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store (Post $post)
    {
        request()->validate([
            'body' => ['required', 'max:500', 'min:2'],
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success', 'Your comment has been added.');
    }
}
