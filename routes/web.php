<?php

use Illuminate\Http\Request;
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
    return view('home');
});

Route::view('contact', 'contact');
Route::view('about', 'about');
Route::view('login', 'login');

// Route::get('contact', function(){
//     return request()->is('contact') ? 'sama' : 'tidak';
// });

// Route::get('about', function(Request $request){
//     return $request->fullUrl();
// });

// Route::get('login', function(Request $request){
//     return $request->fullUrl();
// });



















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