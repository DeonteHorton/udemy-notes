<?php

use App\Models\User;
use App\Models\Post;
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

// creates a post under this user
Route::get('/create',function(){

    $user = User::findOrFail(1);

    // 1st Method
    $post = new Post(['title'=>'my second post','body'=>'i like laravel relations']);
    $user->post()->save($post);

    // 2nd Method 
    // $user->save(new Post(['title'=>'my second post','body'=>'i like laravel relations']));
    

});

// finds all the post that are under this user
Route::get('/read',function(){

    $user = User::findOrFail(1);

    foreach ($user->post as $post) {
        echo $post->title;
    }
   
    
    // dd($user->post);
    // dd($user);

});

// updates a post that is under this user
Route::get('/update',function(){

    $user = User::find(1);

    $user->post()->whereId(1)->update(['title'=>'updated the title through the users table']);

});


// deletes a post that is under this user
Route::get('/delete',function(){
    $user = user::find(1);

    $user->post()->whereId(2)->delete();
});

// deletes all post that are under this user
Route::get('/deleteall',function(){
    $user = user::find(1);

    $user->post()->delete();
});