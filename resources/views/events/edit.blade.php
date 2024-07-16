@extends('layouts.app')

@section('content')
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ $event->title }}">
        </div>
        <div>
            <label>Poster</label>
            <input type="file" name="poster">
            <img src="{{ url('storage/posters/' . $event->poster) }}" width="200-">
        </div>
        <div>
            <label>Event Date</label>
            <input type="date" name="event_date" value="{{ $event->event_date }}">
        </div>
        <div>
            <label>Venue</label>
            <select name="venue_id">
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{ $event->venue_id == $venue->id ? 'selected' : '' }}>{{ $venue->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
