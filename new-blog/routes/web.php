<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use App\Models\Photo;
use App\Models\User;
use App\Models\Roles;
use App\Models\Country;

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

Route::get('test','App\Http\Controllers\PostsController@post');

// Route::get('/about', function () {
//     return "hello about";
// });

// Route::get('/contact', function () {
//     return "hello contact";

// });

// Route::get('/post/{id}', function ($id) {
//     return "hello admin {$id}";

// });

// Route::get('admin/post/example/name/id',array('as' =>'admin.home',function(){

//     $url = route('admin.hom');
//     return "this url is {$url}";

// }));

// this is how you access a specific method 
// Route::get('/post/{string}','\App\Http\Controllers\PostsController@index');

// this is how you get all the methods on that file
// Route::resource('/post','\App\Http\Controllers\PostsController');

// Route::get('/contact','\App\Http\Controllers\PostsController@contact');

// Route::get('/post','\App\Http\Controllers\PostsController@post');


// Route::get('/post/{id}','\App\Http\Controllers\PostsController@show_post');


Route::get('/insert',function(){

    // this is how you can easily insert data into the database.

    DB::insert("insert into posts(title,body) values (?,?)" , ['PHP with laravel', 'PHP laravel is the best thing that happened'] );

});

// Route::get('/read',function(){
//     // this method select information from the database 
//     $results = DB::select('SELECT * from post ');
//     return $results;
//     // foreach($results as $result){
//     //     echo $result->title;
//     //     echo "<br>";
//     //     echo $result->body;
//     // };
// });

// Route::get('/update',function(){
//     // this method updates data in the table 
//     $results = DB::update("update posts set title = 'update title'");
// });

// Route::get('/delete',function(){

//     $result = DB::delete("Delete from post where id = ?",[1]);

//     return $result;
// });


/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
|
*/

// Route::get('/find',function(){

//     // this gets all the data from the table 
//     // $posts = Posts::all();

//     // foreach ($posts as $post ) {
//     //     return $post->title;
//     // }
    

//     $posts = Posts::find(1);
//     return $posts->title;


// });

// Route::get('/findwhere',function(){
//     // this methods get the data where the id = 2, then the id is order by ascending, then the data us being grabbed by get()
//     $posts = Posts::where('id',2)->orderBy('id','ASC')->get();

//     return $posts;
// });

// 
// this method can either save and insert the data or it can update already existing data 
// Route::get('/basicinsert',function(){

//     $post = Posts::find(4);

//     $post->title = 'title4';
//     $post->body= 'wow';
//     $post->save();

// });

Route::get('/create',function(){

    // this method creates data for the table 
    Posts::create(['user_id'=>'1','title'=>'Netlink','body'=>'Voice']);

});

Route::get('/update',function(){

    // updating the data within the table
    Posts::where('id',2)->where('is_admin',0)->update(['title'=>'I like php','body'=>'I\'m loving php and laravel']);;

});

// single delete 
Route::get('/delete_single',function(){

    $post = Posts::find(1);
    $post->delete();

});

// Multi delete 
Route::get('/delete_multi',function(){

    Posts::destroy([2,3]);

});

Route::get('/softdelete',function(){
    // this is how you do a soft delete 

     Posts::find(6)->delete();

});

Route::get('/readsoftdelete',function(){

    // $post = Posts::find(1);

    // return $post;
    
    // this is how you get both soft deleted and non-deleted data 
    // $post = Posts::withTrashed()->get();


    // this is how you get the data with soft deleted data 
    // $post = Posts::withoutTrashed()->get();



    // this is how you get only the soft deleted data 
    $post = Posts::onlyTrashed()->get();

    return $post;

});


Route::get('/restore',function(){

    // this is how you restore/undo the soft delete 
    posts::withTrashed()->where('id',4)->restore();

});

Route::get('/forcedelete/{id}',function($id){

    // this is how you force delete data from the database 
    Posts::onlyTrashed()->where('id',$id)->forceDelete();

});


// One to One relationship 
Route::get('/user/{id}/post',function($id){

    $user = User::find($id)->roles()->get();
    return $user;

    // foreach($user->roles as $role){

    //     echo "<h1>{$role->name}";

    // }

});

Route::get('/post/{id}/user',function($id){

    return Posts::find($id)->user->name;

});

Route::get('/posts',function(){

    $user = User::find(1);

    foreach($user->posts as $post){

        echo "<h1>Title: {$post->title} <br> Body: {$post->body}</h1>";

    }

});

Route::get('/role{id}/user',function($id){

    return Roles::find($id);

});


/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
|
*/





/*
|--------------------------------------------------------------------------
| Accessing the pivot table
|--------------------------------------------------------------------------
|
*/

Route::get('/user/pivot',function(){

    $user = User::find(1);


    // this would work if the created_at was included in the pivot 
    // foreach ($user->roles as $role) {
    //     return $role->pivot->created_at;
    // }

        foreach ($user->roles as $role) {
        return $role->created_at;
    }


});


Route::get('/user/country',function(){

    $country = Country::find(7);
    // return $country;

    foreach($country->posts as $post){
        return $post;
    };

});

Route::get('/user/{id}/photos',function($id){
    $user = User::find($id);
    
    foreach ($user->photos as $photo) {
        echo $photo;
    }
    // return $user->photos;
});

Route::get('/post/{id}/photos',function($id){
    $posts = Posts::find($id);
    
    foreach ($posts->photos as $post) {

        echo $post->path . "<br>";
    }
    // return $posts->photos;
});



Route::get('/photo/{id}/post',function($id){

   $photo = Photo::findOrFail($id);

   return $photo->image;

});



Route::group(['middleware' => ['web']],function(){

});