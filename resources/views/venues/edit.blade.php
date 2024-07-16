@extends('layouts.app')

@section('content')
    <h1>Edit Venue</h1>
    <form action="{{ route('venues.update', $venue->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $venue->name }}">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
