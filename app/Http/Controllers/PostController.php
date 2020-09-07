<?php

namespace App\Http\Controllers;

use App\{Category, Post, Tag}; // mmenyederhanakan namespace yg sama
use App\Http\Requests\PostRequest;
// use App\Post;
// use App\Tag;
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $attr = $request->all();

        $attr['slug'] = Str::slug($request->title);
        // tambahkan category ke post
        $attr['category_id'] = $request->category;

        $post = Post::create($attr);
        // tambahkan tag ke post
        $post->tags()->attach($request->tags);
        
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    // k: implementasikan method validateRequest() yg dibawah
    public function update(Post $post)
    {
        // panggil method yg dibawah
        $attr = $this->validateRequest();
        $attr['category_id'] = request()->category;

        // untuk slug disarankan tidak diubah
        $post->update($attr);

        $post->tags()->sync(request()->tags);

        // buat session
        session()->flash('success', 'The post was updated!');

        return redirect()->to('post');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        session()->flash('success', 'The post was deleted!');

        return redirect('post');
    }

    // method untuk validasi
    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'array|required'
        ]);
    }

}
