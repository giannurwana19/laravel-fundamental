<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    // k: kita juga bisa gunakan helper request()
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        $post = $request->all();
        $post['slug'] = Str::slug($request->title);

        Post::create($post);

        // buat session
        session()->flash('success', 'The post was created!');

        return redirect()->to('post');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        // untuk slug disarankan tidak diubah
        $post->update($attr);

        // buat session
        session()->flash('success', 'The post was updated!');

        return redirect()->to('post');
    }

}
