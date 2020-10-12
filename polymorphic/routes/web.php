<?php

use App\Models\Staff;
use App\Models\Photo;
use App\Models\Product;
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

// this method finds the model and saves the picture with the related model 
Route::get('/create',function(){

    $staff = Staff::find(1);

    $staff->photos()->create(['path'=>'example.jpg']);


});


Route::get('/read',function(){

    $staff = Staff::findOrFail(1);

    dd($staff->photos);
});

Route::get('/update',function(){

    $staff = Staff::findOrFail(1);

    // 1st method 
    // first() returns only one record while get() returns an array of records 
    // $photo = $staff->photos()->whereId(1)->first();

    // $photo->path = 'oldpath.png';

    // $photo->save();


    // 2nd method 
    $photo = new Photo(['path'=>'www.png']);

    $staff->photos()->save($photo->whereId(2)->first());

});

Route::get('/delete',function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(1)->first()->delete();

});

Route::get('/assign',function(){

    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(3);

    $staff->photos()->save($photo);

});


Route::get('/un-assign',function(){

    $staff = Staff::findOrFail(1);


    $staff->photos()->whereId(3)->update(['imageable_id'=>'0','imageable_type'=>'']);

});