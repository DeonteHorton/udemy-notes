@extends('layouts.app')

@section('content')
<div class='form-wrapper'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='form-box'>
                    <form action="/insert"  class="form">
                        <h2>Enter Blog Title in the input field below</h2>
                        <input type='text' placeholder='Title here' name="title" class="form-control"/>
                        <h2>Enter your Blog in the input field below</h2>
                        <textarea name="text" class="form-control" class="space" cols="50" rows="5" id='blog-text' placeholder="This is how my day was......"></textarea>
                        <br>
                        <input type='submit' class='null btn btn-primary' value='Publish' />
                        <br>
                    </form>
                    <a style={margin} class='btn btn-primary' href='/blog'>Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection