@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-md-12">
       @if ( Auth::user()->usertype == 'admin'  )     <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create Event</a>
        @endif
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>@sortablelink('id')</th>
                    <th>Poster</th>
                    <th>@sortablelink('title')</th>
                    <th>@sortablelink('event_date', 'date')</th>
                    <th>@sortablelink('venue.name', 'venue')</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>
                            <img src="{{ url($event->path . $event->poster) }}" alt="{{$event->title}}" width="200px">
                        </td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->venue->name }}</td>
                        <td>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">View</a>
                            @if ( Auth::user()->usertype == 'admin'  )
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
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
           {!! $events->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
