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
    return view('welcome');
});

// Route::get('/home',function(){
//     return view('home');
// });

// Route::get('/blog',function(){
//     return view('blog');
// });

Route::get('/test/{string}','App\Http\Controllers\BlogController@index');
Route::get('/blog','App\Http\Controllers\BlogController@allBlogs');
Route::get('/blog/{id}','App\Http\Controllers\BlogController@getBlog');
Route::get('/yourblog/{name}','App\Http\Controllers\BlogController@getUserBlogs');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
