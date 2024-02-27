<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTypeRequest;
use App\Models\EventType;
use Inertia\Inertia;

class EventTypeController extends Controller
{
    public function index()
    {
        return EventType::all();
    }

    public function dashboard()
    {
        $eventTypes = EventType::all();

        return Inertia::render('EventType/Dashboard', [
            'eventTypes' => $eventTypes
        ]);
    }

    public function store(EventTypeRequest $request)
    {
        EventType::create($request->validated());

        return redirect()->route('dashboard.event-types');
    }

    public function show(EventType $eventType)
    {
        return $eventType;
    }

    public function update(EventTypeRequest $request, EventType $eventType)
    {
        $eventType->update($request->validated());

        return redirect()->route('dashboard.event-types');
    }

    public function destroy(EventType $eventType)
    {
        $eventType->delete();

        return redirect()->route('dashboard.event-types');
    }
}
