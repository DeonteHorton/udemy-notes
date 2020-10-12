@extends('layouts.app')

@section('content')

<h1>Edit post {{ $post->title }}</h1>

{{ Form::model($post,['method'=>'PATCH','action'=>['App\Http\Controllers\PostsController@update',$post->id]]) }}

{{-- first param is for the name, the second param is the actual text  --}}
{{ Form::label('title','Title') }}

{{ Form::text('title',$post->title,['class'=>'form-control']) }}
{{ Form::label('body','Body') }}
{{ Form::textarea('body',$post->body,['class'=>'form-control']) }}
{{ Form::submit('submit') }}

{{-- <input type="text" name="title" placeholder="Enter title">

<textarea name="body" id="" cols="30" rows="10"></textarea>
<input type="submit" value="submit"> --}}

{{ Form::close() }}


{{ Form::model($post,['method'=>'DELETE','action'=>['App\Http\Controllers\PostsController@destroy',$post->id]]) }}
{{ Form::submit('Delete') }}
{{ Form::close() }}


@endsection