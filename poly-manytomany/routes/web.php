<?php

use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
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


Route::get('/create',function(){

    $post = Post::create(['name'=>'my first post']);
    
    $tag1 = Tag::find(1);

    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video.mov']);

    $tag2 = Tag::find(1);
    
    
    $video->tags()->save($tag2);


});


Route::get('/read',function(){

    $post = Post::findOrFail(1);

    // dd($post->tags[0]);

    $video = Video::findOrFail(1);

    dd($post->tags);

});


Route::get('/update',function(){

    // $post = Post::findOrFail(1);

    // foreach($post->tags as $tag){
    //     return $tag->where('name','PHP')->update(['name'=>'UPDATED PHP']);
    // }

    $post = Post::findOrFail(1);

    $tag = Tag::find(3);

    $post->tags()->sync($tag);

    // $post->tags()->attach($tag);
    
    // $post->tags()->save($tag);
});

Route::get('/delete',function(){


    $post = Post::findOrFail(1);

    // deletes the tag that is related to post 1 by it's id
    foreach ($post->tags as $tag) {
        $tag->whereId(2)->delete();
    }
});