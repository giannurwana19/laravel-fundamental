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
    // k: kita bisa gunakan __construct() jalankan middleware
    // public function __construct()
    // {
    // p: lindungi semua method, harus login dulu
    // p: kecuali index & show
    //     $this->middleware('auth')->except(['index', 'show']);    
    // }

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
        $attr['category_id'] = $request->category; // + category -> post

        // + post dari user yg login
        $post = auth()->user()->posts()->create($attr);
        $post->tags()->attach($request->tags); // + tag -> post

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
        // * dilindungi dengan policy
        $this->authorize('update', $post);

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
        $this->authorize('delete', $post);

        session()->flash('success', 'The post was deleted!');

        return redirect('post');

        // k: bisa juga pake ini
        // if (auth()->user()->is($post->author)) {
        //     $post->tags()->detach();
        //     $post->delete();

        //     session()->flash('success', 'The post was deleted!');

        //     return redirect('post');
        // } else {
        //     session()->flash('error', "it wasn't your post!" );

        //     return redirect()->route('post.index');
        // }
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
