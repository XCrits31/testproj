@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-md-12">
            <h1>Create Event</h1>
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <input type="file" name="poster" class="form-control-file">
                </div>
                <div class="form-group">
                    <label>Event Date</label>
                    <input type="date" name="event_date" class="form-control">
                </div>
                <div class="form-group">
                    <label>Venue</label>
                    <select name="venue_id" class="form-control">
                        @foreach($venues as $venue)
                            <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
