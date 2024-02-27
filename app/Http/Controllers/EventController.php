<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Subject;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function dashboard()
    {
        $events = Event::with('subject', 'eventType')->get();
        $eventTypes = EventType::all();
        $subjects = Subject::all();

        return Inertia::render('Event/Dashboard', [
            'events' => $events,
            'eventTypes' => $eventTypes,
            'subjects' => $subjects
        ]);
    }

    public function store(EventRequest $request)
    {
        Event::create($request->validated());

        return redirect()->route('dashboard.events');
    }

    public function show(Event $event)
    {
        return $event;
    }

    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return redirect()->route('dashboard.events');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('dashboard.events');
    }
}
