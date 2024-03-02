<?php

namespace App\Http\Controllers;

use App\Helpers\FixTimeZone;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Subject;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('subject', 'eventType')->get();
        $eventTypes = EventType::all();
        $subjects = Subject::all();

        return Inertia::render('Event/Index', [
            'events' => $events,
            'eventTypes' => $eventTypes,
            'subjects' => $subjects
        ]);
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
        $event = Event::create($request->validated());

        if ($event->date !== null) {
            $event->date = FixTimeZone::call($request->date);
            $event->save();
        }

        return redirect()->route('dashboard.events');
    }

    public function show(Event $event)
    {
        return $event;
    }

    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());

        if ($event->date !== null) {
            $event->date = FixTimeZone::call($request->date);
            $event->save();
        }

        return redirect()->route('dashboard.events');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('dashboard.events');
    }
}
