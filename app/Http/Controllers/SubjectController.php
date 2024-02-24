<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function dashboard()
    {
        $subjects = Subject::all();

        return Inertia::render('Subject/Dashboard', [
            'subjects' => $subjects
        ]);
    }

    public function store(SubjectRequest $request)
    {
        Subject::create($request->validated());

        return redirect()->route('subjects.dashboard');
    }

    public function show(Subject $subject)
    {
        return $subject;
    }

    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());

        return redirect()->route('subjects.dashboard');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.dashboard');
    }
}
