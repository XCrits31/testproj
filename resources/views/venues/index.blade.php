@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-md-12">
            @if (Auth::user()->usertype == 'admin')
            <a href="{{ route('venues.create') }}" class="btn btn-primary mb-3">Create Venue</a>
            @endif
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>@sortablelink('id')</th>
                    <th>@sortablelink('name')</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($venues as $venue)
                    <tr>
                        <td>{{ $venue->id }}</td>
                        <td>{{ $venue->name }}</td>
                        <td>
                            <a href="{{ route('venues.show', $venue->id) }}" class="btn btn-info btn-sm">View</a>
                            @if (Auth::user()->usertype == 'admin')
                            <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                {!! $venues->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
