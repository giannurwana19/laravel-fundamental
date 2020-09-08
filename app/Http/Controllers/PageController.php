<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    // h: blok ini hanya comment saja
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $name = request()->name;
        return view('pages.home', compact('name'));
    }
}




