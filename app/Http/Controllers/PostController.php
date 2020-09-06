<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // k: mengambil semua data
        // return Post::get();
        $posts = Post::paginate(4);
        
        // k: mengambil hanya title dan slug saja
        // return Post::get(['title', 'slug']);
        // return Post::all(['title', 'slug']);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.show', compact('post'));
    }
}
