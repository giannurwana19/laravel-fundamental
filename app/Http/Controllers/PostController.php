<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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

    // k: implementasi PostRequest (sudah divalidasi) yang kita buat
    public function store(PostRequest $request)
    {
        $attr = $request->all();

        $attr['slug'] = Str::slug($request->title);

        Post::create($attr);

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

    // k: implementasikan method validateRequest() yg dibawah
    public function update(Post $post)
    {
        // panggil method yg dibawah
        $attr = $this->validateRequest();

        // untuk slug disarankan tidak diubah
        $post->update($attr);

        // buat session
        session()->flash('success', 'The post was updated!');

        return redirect()->to('post');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('success', 'The post was deleted!');

        return redirect('post');
    }

    // method untuk validasi
    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);
    }

}
