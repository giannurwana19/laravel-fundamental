<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // k: jika post nya kosong
        // if(!$post){ // atau is_null($post) 
        //     abort(404); // redirect ke page 404
        // }

        return view('posts.show', compact('post'));
    }
}
