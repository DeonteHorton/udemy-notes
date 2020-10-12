@extends('layouts.app')

@section('content')
    <ul>
        <li>Title :{{ $post->title }}</li>
        <li>Body :{{ $post->body }}</li>
        <li><a href="{{ route('posts.edit',$post->id) }}">Edit this post</a></li>
    </ul>
@endsection