<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($string)
    {
        //
        return "Hello there {$string}";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function test(){
    
        $people = user::all();

        return view('blog',compact('people'));


    }

    public function allBlogs(){
    
        $blogs = Blog::all();

        return view('blog',compact('blogs'));

    }

    public function getBlog($id){
    
        $blog = Blog::find($id);

        return view('blogSingle',compact('blog'));

    }


    public function getUserBlogs($name){
    
        $blogs = Blog::where('author',$name)->get();

        return view('blog',compact('blogs'));
    //    return $blogs;

    }


    public function insert($title,$author,$text,$created_at){
    
        $blog = Blog::insert('insert into blogs (title,author,text,created_at) values (?,?,?,?)',[$title,$author,$text,$created_at]);

        return $blog;

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
}
