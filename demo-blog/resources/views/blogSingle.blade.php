@extends('layouts.app')
@section('content')
<div class='blog-wrapper'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class="box">
                    <h1 class="title_style">Title: {{ $blog->title }}</h1>
                    <img src="https://via.placeholder.com/1075x300" alt="">
                    <h2 class="user_style">Author: {{ $blog->author }}</h2>
                    <p>Blog: {{ $blog->text }}</p>
                    <h3>Time Created: {{ $blog->created_at }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection