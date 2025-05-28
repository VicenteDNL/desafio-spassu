<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectPostRequest;
use App\Models\Subject;

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
        return  redirect()
            ->route('subjects.show', ['subject' => $subject])
            ->with('success', 'Assunto criado com sucesso');
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
        $validated = $request->validated();
        $subject->update($validated);
        return redirect()
            ->route('subjects.show', $subject)
            ->with('success', 'Assunto alterado com sucesso');
    }

    public function destroy(Subject $subject)
    {
        if (count($subject->books) > 0) {
            return redirect()
                ->back()
                ->with('error', 'Não é possível deletar um assunto vinculado a um livro');
        }
        $subject->delete();
        return redirect()
            ->route('subjects.index')
            ->with('success', 'Assunto deletado com sucesso');
    }
}
