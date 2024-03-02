<?php

namespace App\Http\Controllers;

use App\Helpers\FixTimeZone;
use App\Http\Requests\LectureRequest;
use App\Models\Lecture;
use App\Models\Subject;
use Exception;
use Inertia\Inertia;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::with(['subject', 'videos'])->get();
        $subjects = Subject::all();

        return Inertia::render('Lecture/Index', [
            'lectures' => $lectures,
            'subjects' => $subjects
        ]);
    }

    public function dashboard()
    {
        $lectures = Lecture::with('subject', 'videos')->get();
        $subjects = Subject::all();

        return Inertia::render('Lecture/Dashboard', [
            'lectures' => $lectures,
            'subjects' => $subjects
        ]);
    }

    public function store(LectureRequest $request)
    {
        $lecture = Lecture::create($request->validated());

        if (!empty(array_filter(
            $request->videos, fn($video) => $video['youtube_link']
        ))) {
            $lecture->videos()->createMany($request->videos);
        }

        // Fix date timezone
        $lecture->date = FixTimeZone::call($lecture->date);
        $lecture->save();

        return redirect()->route('dashboard.lectures');
    }

    public function show(Lecture $lecture)
    {
        return $lecture->load('videos');
    }

    /**
     * @throws Exception
     */
    public function update(LectureRequest $request, Lecture $lecture)
    {
        if ($request->validated()) {
            // Delete all videos before inserting new ones
            $lecture->videos()->delete();

            $lecture->update($request->validated());

            if (!empty(array_filter(
                $request->videos, fn($video) => $video['youtube_link']
            ))) {
                $lecture->videos()->createMany($request->videos);
            }

            // Fix date timezone
            $lecture->date = FixTimeZone::call($request->date);
            $lecture->save();
        }

        return redirect()->route('dashboard.lectures');
    }

    public function destroy(Lecture $lecture)
    {
        $lecture->videos()->delete();
        $lecture->delete();

        return redirect()->route('dashboard.lectures');
    }
}
