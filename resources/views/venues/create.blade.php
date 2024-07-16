@extends('layouts.app')

@section('content')
    <h1>Create Venue</h1>
    <form action="{{ route('venues.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
