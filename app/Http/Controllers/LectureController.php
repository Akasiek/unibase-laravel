<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureRequest;
use App\Models\Lecture;
use Inertia\Inertia;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::get([
            'id',
            'date',
            'summary',
        ])->map(function ($lecture) {
            $lecture->date = $lecture->date->format('Y-m-d');
            return $lecture;
        });

        return Inertia::render('Lectures/Index', [
            'lectures' => $lectures,
        ]);
    }

    public function store(LectureRequest $request)
    {
        $this->prepareVideos($request);

        return Lecture::create($request->validated());
    }

    public function show(Lecture $lecture)
    {
        return $lecture->load('videos');
    }

    public function update(LectureRequest $request, Lecture $lecture)
    {
        $this->prepareVideos($request);

        $lecture->update($request->validated());

        return $lecture;
    }

    public function destroy(Lecture $lecture)
    {
        $lecture->videos()->delete();
        $lecture->delete();

        return response()->json();
    }

    private function prepareVideos(LectureRequest $request): void
    {
        if ($request->has('videos')) {
            $videos = $request->videos;
            $videos = array_map(function ($video) {
                return [
                    'url' => $video['url'],
                    'title' => $video['title'],
                ];
            }, $videos);

            if (count($videos) > 0) {
                $this->validateVideos($videos);
            }

            $request->merge(['videos' => $videos]);
        }
    }

    private function validateVideos(array $videos): void
    {
        foreach ($videos as $video) {
            $this->validate($video, [
                'url' => ['required', 'url'],
                'title' => ['required'],
            ]);
        }
    }
}
