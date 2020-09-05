<?php

namespace App\Http\Controllers;

class HomeController extends Controller
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
        return view('home', compact('name'));
    }
}




