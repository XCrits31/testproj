<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::sortable()->paginate(5);
        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        if(auth()->user()->role == 'admin') {
            return view('venues.create');
        }
        else{
            $venues = Venue::all();
            return view('venues.index', compact('venues'));
        }
    }

    public function store(Request $request)
    {
        if(auth()->user()->role == 'admin') {
        $request->validate([
            'name' => 'required',
        ]);

        Venue::create($request->all());

        return redirect()->route('venues.index');
        }
        else{
            $venues = Venue::all();
            return view('venues.index', compact('venues'));
        }
    }

    public function show(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }

    public function edit(Venue $venue)
    {
        if(auth()->user()->role == 'admin') {
        return view('venues.edit', compact('venue'));
        }
        else{
            $venues = Venue::all();
            return view('venues.index', compact('venues'));
        }
    }

    public function update(Request $request, Venue $venue)
    {
        if(auth()->user()->role == 'admin') {
        $request->validate([
            'name' => 'required',
        ]);

        $venue->update($request->all());

        return redirect()->route('venues.index');
        }
        else{
            $venues = Venue::all();
            return view('venues.index', compact('venues'));
        }
    }

    public function destroy(Venue $venue)
    {
        if (auth()->user()->role == 'admin') {
            $venue->delete();
            return redirect()->route('venues.index');
        } else {
            $venues = Venue::all();
            return view('venues.index', compact('venues'));
        }
    }
}

