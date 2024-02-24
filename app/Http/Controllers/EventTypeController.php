<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTypeRequest;
use App\Models\EventType;

class EventTypeController extends Controller
{
    public function index()
    {
        return EventType::all();
    }

    public function store(EventTypeRequest $request)
    {
        return EventType::create($request->validated());
    }

    public function show(EventType $eventType)
    {
        return $eventType;
    }

    public function update(EventTypeRequest $request, EventType $eventType)
    {
        $eventType->update($request->validated());

        return $eventType;
    }

    public function destroy(EventType $eventType)
    {
        $eventType->delete();

        return response()->json();
    }
}
