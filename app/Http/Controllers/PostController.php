<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request()->query())
                ->paginate(6)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
