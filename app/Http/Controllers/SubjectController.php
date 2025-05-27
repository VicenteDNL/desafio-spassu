<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectPostRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('pages.subject.index', ['subjects' => Subject::orderBy('updated_at')->paginate(10)]);
    }

    public function create()
    {
        return view('pages.subject.create');
    }

    public function store(SubjectPostRequest $request)
    {
        $validated = $request->validated();
        $subject = new Subject($validated);
        $subject->save();
        return  redirect()->route('subjects.show', ['subject' => $subject]);
    }

    public function show(Subject $subject)
    {
        return view('pages.subject.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('pages.subject.edit', compact('subject'));
    }

    public function update(SubjectPostRequest $request, Subject $subject)
    {
        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        return redirect()->route('subjects.index');
    }
}
