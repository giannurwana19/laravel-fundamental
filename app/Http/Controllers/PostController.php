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
        // Post::create([
        //     'title' => $request->title,
        //     'slug' => Str::slug($request->slug),
        //     'body' => $request->body
        // ]);
        
        // k: cara mass assignment jika ada field yang dimodifikasi
        $post = $request->all();
        $post['slug'] = Str::slug($request->title);

        Post::create($post);

        return back(); // kembali ke halaman create
    }

    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.show', compact('post'));
    }

}
