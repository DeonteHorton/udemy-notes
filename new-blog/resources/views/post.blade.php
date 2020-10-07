@extends('layouts.app')

@section('content')
    <h1>post page here</h1>

    @if(count($people))
        @foreach($people as $person)
        <h2>Name: {{ $person->name }}</h2>
        <h2>Email: {{ $person->email }}</h2>
        <h2>Password: {{ $person->password }}</h2>
        <h2>Day Created: {{ $person->created_at }}</h2>
        <h2>Country: {{ $person->country_id }}</h2>
        <hr>
        @endforeach

    @endif
@endsection