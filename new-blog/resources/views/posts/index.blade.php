@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($posts as $post)
        {{-- route is basically returning a view or redirecting you to a page --}}
            <li><a href="{{ route('posts.show',$post->id) }}">Title: {{ $post->title }}</a></li>
            {{-- <li>Body: {{ $post->body }}</li> --}}
        @endforeach
    </ul>
@endsection
