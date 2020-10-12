<?php

use App\Models\Address;
use App\Models\User;
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

    $user = User::create(['name'=>'deonte','email'=>'deonte@nuyya.com','password'=>'tesing123']);

});


Route::get('/insert',function(){

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'1234 jackson ave']);

    $user->address()->save($address);

});

Route::get('/read',function(){
    $user = user::findOrFail(1);

    return $user->address;
});

Route::get('/delete',function(){

    $user = user::findOrFail(1);

    $user->address()->delete();

});



