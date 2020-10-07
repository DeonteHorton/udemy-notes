<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers;
use App\Models\Country;
use App\Models\Posts;
use App\Models\User;
use App\Models\Roles;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($string)
    {
        //
        echo "hello {$string}";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "I am the method that creates stuff :)";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return "Hello, number {$id} is avalible";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contact(){
    
        // this is how you pass data through a view 
        // return view('contact')->with('string',$string);

        // compact converts the string into a variable if it has the same name 
        $numbers = [1,3,52,3,5,5,3,4,53];
        return view('contact',compact('numbers'));

    }

    public function post(){
    
        $people = User::all();


        return view('post',compact('people'));

    }

    public function show_post(){
    
        return view('post');
    }
}
