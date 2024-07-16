@extends('layouts.app')

@section('content')
    <h1>{{ $venue->name }}</h1>
    <a href="{{ route('venues.edit', $venue->id) }}">Edit</a>
@endsection
