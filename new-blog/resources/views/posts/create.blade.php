@extends('layouts.app')

@section('content')
<h1>Create post</h1>



    {{ Form::open(['method'=>'POST','action'=>'App\Http\Controllers\PostsController@store','files'=>true,]) }}

    <div class="form-group">
        {{ Form::file('file',['class'=>'form-control']) }}
    </div>
    {{-- first param is for the name, the second param is the actual text  --}}
    <div class="form-group">
        {{ Form::label('title','Title') }}
        {{ Form::text('title',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body','Body') }}
        {{ Form::text('body',null,['class'=>'form-control']) }}
    </div>
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