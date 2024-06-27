<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.event', compact('events'));
    }

    public function fetchEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'content' => 'required|string',
            'location' => 'required|string',
            'caption' => 'required|string',
            'date' => 'required|date',
        ]);

        $event = new Event;
        $event->user_id = Auth::id();
        $event->event_name = $request->event_name;
        $event->content = $request->content;
        $event->location = $request->location;
        $event->caption = $request->caption;
        $event->date = $request->date;
        $event->save();

        return response()->json(['message' => 'Event created successfully', 'event' => $event]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }
    
}
