<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Mockery\Exception;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('venue')->sortable()->paginate(5);
        return view('events.index', compact('events'));
    }

    public function create()
    {
            if (Auth::user()->usertype == 'admin') {
                $venues = Venue::all();
                return view('events.create', compact('venues'));
            } else {
                $events = Event::with('venue')->get();
                return view('events.index', compact('events'));
            }


    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if($user->usertype == 'admin') {
            $request->validate([
                'title' => 'required',
                'poster' => 'required|image|dimensions:min_width=400,min_height=400',
                'event_date' => 'required|date',
                'venue_id' => 'required|exists:venues,id',
            ]);

            $poster = $request->file('poster');
            $originalName = Str::uuid() . $poster->getClientOriginalName();
            try {
                $poster->storeAs('posters', $originalName, 'public');
                $manager = new ImageManager(new Driver());
                $image = $manager->read('storage/posters/' . $originalName);


                if ($image->width() > 800 || $image->height() > 800) {
                    $image->crop(800, 800, 0, 0, '000000', 'center');
                }
                $image->save('storage/posters/' . $originalName);
            } catch (Exception $e){
                Log::error($e);
                $originalName = 'error.jpg';
            } finally {


            Event::create([
                'title' => $request->title,
                'poster' => $originalName,
                'event_date' => $request->event_date,
                'venue_id' => $request->venue_id,
            ]);

            return redirect()->route('events.index');

            }
        }
        else {
                $events = Event::with('venue')->get();
                return view('events.index', compact('events'));
            }
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        if(auth()->user()->usertype == 'admin') {
        $venues = Venue::all();
        return view('events.edit', compact('event', 'venues'));
        }
        else {
            $events = Event::with('venue')->get();
            return view('events.index', compact('events'));
        }
    }

    public function update(Request $request, Event $event)
    {
        if(auth()->user()->usertype == 'admin') {
        $request->validate([
            'title' => 'required',
            'poster' => 'required|image|dimensions:min_width=400,min_height=400',
            'event_date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
        ]);
        $data = [
            'title' => $request->title,
            'event_date' => $request->event_date,
            'venue_id' => $request->venue_id,
        ];
        if ($request->hasFile('poster')) {
           try {
               $poster = $request->file('poster');
               $data['poster'] = Str::uuid() . $poster->getClientOriginalName();

               $poster->storeAs('posters', $data['poster'], 'public');
               $manager = new ImageManager(new Driver());
               $image = $manager->read('storage/posters/' . $data['poster']);


               if ($image->width() > 800 || $image->height() > 800) {
                   $image->crop(800, 800, 0, 0, '000000', 'center');
               }
               $image->save('storage/posters/' . $data['poster']);
           }
           catch (Exception $e){
               Log::error($e);
               $data['poster'] = 'error.jpg';
           }

        finally{
                $event->update($data);

                return redirect()->route('events.edit', $event->id);
            }
        }
        $event->update($data);

            return redirect()->route('events.edit', $event->id);
        }
        else {
            $events = Event::with('venue')->get();
            return view('events.index', compact('events'));
        }
    }

    public function destroy(Event $event)
    {
        if(auth()->user()->usertype == 'admin') {
        Storage::disk('public')->delete($event->poster);
        $event->delete();
        return redirect()->route('events.index');
        }
        else {
            $events = Event::with('venue')->get();
            return view('events.index', compact('events'));
        }
    }
}

