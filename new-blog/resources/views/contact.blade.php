@extends('layouts.app')

@section('content')

    <h1>contact page</h1>

    @if (count($numbers))

    <ul>

        @foreach($numbers as $number)

        <li>{{ $number }}</li>

        @endforeach

    </ul>
    
    @endif

@stop

@section('footer')

<script>alert('Hello user')</script>
@stop
