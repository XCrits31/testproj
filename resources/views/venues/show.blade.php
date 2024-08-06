@extends('layouts.app')

@section('content')
    <h1>{{ $venue->name }}</h1>
    @if (Auth::user()->usertype == 'admin')<a href="{{ route('venues.edit', $venue->id) }}">Edit</a>
    @endif
@endsection
