@extends('layouts.app')

@section('content')
<h1>Create post</h1>



    {{ Form::open(['method'=>'POST','action'=>'App\Http\Controllers\PostsController@store']) }}

    {{-- first param is for the name, the second param is the actual text  --}}
    {{ Form::label('title','Title') }}

    {{ Form::text('title',null,['class'=>'form-control']) }}
    {{ Form::label('body','Body') }}
    {{ Form::textarea('body','body',['class'=>'form-control']) }}
    {{ Form::submit('Create') }}

    {{ Form::close() }}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



@endsection