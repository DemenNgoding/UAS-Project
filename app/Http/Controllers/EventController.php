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
        $events = Event::with('user')->get()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->event_name,
                'start' => $event->date,
                'location' => $event->location,
                'content' => $event->content,
                'caption' => $event->caption,
                'user_name' => $event->user->name,
            ];
        });

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

        return response()->json([
            'message' => 'Event created successfully',
            'event' => $event,
            'user_name' => Auth::user()->name,
        ]);
    }

    public function show($id)
    {
        $event = Event::with('user')->findOrFail($id);
        return response()->json([
            'id' => $event->id,
            'event_name' => $event->event_name,
            'date' => $event->date,
            'location' => $event->location,
            'content' => $event->content,
            'caption' => $event->caption,
            'user_name' => $event->user->name,
        ]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
