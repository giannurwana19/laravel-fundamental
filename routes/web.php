<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $name = '<h4>Gian Nurwana</h4>';
    $body = 'Lorem, ipsum dolor sit amet consectetur
     adipisicing elit. Commodi necessitatibus
      voluptatem laborum in, 
     pariatur cumque ab nam recusandae! Quas cumque facilis, vitae autem nam quos repellat nostrum rerum rem quia.';
    return view('welcome', ['name' => $name, 'body' => $body]);
});