<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreatePostRequest;
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
    public function index()
    {
        //
        $posts = Posts::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //

        // return $request->get('title');
        // return $request->title;
        // return $request->all();
        // $input = $request->all();

        // $input['title'] = $request->title;
        // Posts::create($request->all());


        // $this->validate($request,[]);

        Posts::create($request->all());

        return redirect('/posts');

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
        $post = Posts::findOrFail($id);
        return view('posts.show',compact('post'));
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
        $post = Posts::findOrFail($id);

        return view('posts.edit',compact('post'));

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
        $post = Posts::findOrFail($id);
        

        $post->update($request->all());
        return view('posts.show',compact('post'));

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
        $post = Posts::findOrFail($id);

        $post->delete();

        return redirect('/posts');
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
