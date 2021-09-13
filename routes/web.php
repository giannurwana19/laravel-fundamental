<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'PostController@index')->name('post.index');

Route::middleware('auth')->prefix('posts')->group(function () {
    Route::get('/', 'PostController@index')->name('post.index')->withoutMiddleware('auth'); // tanpa middleware
    Route::get('/create', 'PostController@create')->name('post.create');
    Route::get('/{post:slug}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/{post:slug}', 'PostController@update')->name('post.update');
    Route::delete('/{post:slug}', 'PostController@destroy')->name('post.destroy');
    Route::post('/store', 'PostController@store')->name('post.store');
    Route::get('/{post:slug}', 'PostController@show')->name('post.show')->withoutMiddleware('auth');
});

Route::get('category/{category:slug}', 'CategoryController@show')->name('category.show');

Route::get('tag/{tag:slug}', 'TagController@show')->name('tag.show');

Route::get('search', 'SearchController@post')->name('search.post');

Route::view('contact', 'pages.contact');
Route::view('about', 'pages.about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// k: contoh proteksi dengan middleware di route
// Route::get('post/create', 'PostController@create')->middleware('auth')->name('post.create');

// k: jika ingin menambahkan prefix
// Route::prefix('blog')->middleware('auth')->group(function () {














// =================================================================


// h: mengambil full url
// p: mengambil full Url
// Route::get('contact', function (Request $request) {
//     return $request->fullUrl();
// });

// * hasilnya: http://127.0.0.1:8000/contact

// p: mengambil hanya pathnya saja
// Route::get('contact', function (Request $request) {
//     return $request->path();
// });

// * hasilnya: contact

// p: tentang request
// k: kita bisa menggunakan request dari class atau functio
// ? dari class
// Route::get('contact', function (Request $request) {
//     return $request->path() == 'contact' ? true : false;

//     ! atau bisa seperti ini
//     ! cek apakah request ini contact?
//     return request()->is('contact') ? 'sama' : 'tidak';
// });

// ? dari function / helper laravel
// Route::get('contact', function () {
//     return request()->path() == 'contact' ? true : false;
// });

// p: passing data dari request dan controller
// Route::get('/', function () {
//     $name = request('name');
//     return view('home', ['name' => $name]);
// });

// http://127.0.0.1:8000/?name=andi


// p: misal kita ingin mengirim 2 parameter
// yaitu name dan slug

// Route::get('post/{category:name}/{post:slug}', 'PostController@show');
