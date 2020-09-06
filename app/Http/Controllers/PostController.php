<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // k: mengambil semua data
        // return Post::get();
        $posts = Post::paginate(6);
        
        // k: mengambil hanya title dan slug saja
        // return Post::get(['title', 'slug']);
        // return Post::all(['title', 'slug']);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->slug);
        $post->body = $request->body;
        $post->save();

        // return redirect()->to('post'); // arahkan ke path
        return back(); // kembali ke halaman create
    }

    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.show', compact('post'));
    }

}
