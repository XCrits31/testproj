@extends('layouts.app')

@section('content')
    <h1>{{ $event->title }}</h1>
    <img src="{{ url($event->path . $event->poster) }}" width="300">
    <p>Date: {{ $event->event_date }}</p>
    <p>Venue: {{ $event->venue->name }}</p>
    @if (Auth::user()->usertype == 'admin')<a href="{{ route('events.edit', $event->id) }}">Edit</a>
    @endif
@endsection
