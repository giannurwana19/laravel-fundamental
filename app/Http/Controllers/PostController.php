<?php

namespace App\Http\Controllers;

use App\{Category, Post, Tag}; // mmenyederhanakan namespace yg sama
use App\Http\Requests\PostRequest;
// use App\Post;
// use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // eager loading menggunakan with()
        $posts = Post::with('author', 'tags', 'category')->latest()->paginate(6);

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
        $slug = Str::slug($request->title);
        $attr['slug'] = $slug;

        $tumbnail = $request->file('tumbnail');

        if($tumbnail){
            $tumbnail_name = $slug . "." . $tumbnail->extension();
    
            $tumbnail_url = $tumbnail->storeAs('images/posts', $tumbnail_name);
        }else{
            $tumbnail_url = null;
        }

        $attr['category_id'] = $request->category;
        $attr['tumbnail'] = $tumbnail_url;

        // + post dari user yg login
        $post = auth()->user()->posts()->create($attr);
        $post->tags()->attach($request->tags);

        // buat session
        session()->flash('success', 'The post was created!');

        return redirect()->to('post');
    }

    public function show(Post $post)
    {
        $posts = Post::with('author', 'tags', 'category')->where('category_id', $post->category_id)->latest()->limit(6)->get();
        return view('posts.show', compact('post', 'posts'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    // k: implementasikan method validateRequest() yg dibawah
    public function update(Request $request,Post $post)
    {
        // * dilindungi dengan policy
        $this->authorize('update', $post);

        // panggil method yg dibawah
        $attr = $this->validateRequest();
        $attr['category_id'] = request()->category;

        $slug = Str::slug($request->title);
        $attr['slug'] = $slug;

        $tumbnail = $request->file('tumbnail');

        if($tumbnail){
            Storage::delete($post->tumbnail);
            $thumbnail_name = $slug . "." . $tumbnail->extension();
            $tumbnail_url = $tumbnail->storeAs('images/posts', $thumbnail_name);
        }else{
            $tumbnail_url = $post->tumbnail;
        }

        $attr['tumbnail'] = $tumbnail_url;
        
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

        if($post->tumbnail){
            Storage::delete($post->tumbnail);
        }

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
            'tags' => 'array|required',
            'tumbnail' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);
    }
}
