<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthPostRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return view('pages.author.index', ['authors' => Author::orderBy('updated_at')->paginate(10)]);
    }

    public function create()
    {
        return view('pages.author.create');
    }

    public function store(AuthPostRequest $request)
    {
        $validated = $request->validated();
        $author = new Author($validated);
        $author->save();
        return  redirect()
            ->route('authors.show', ['author' => $author])
            ->with('success', 'Autor criado com sucesso');
    }

    public function show(Author $author)
    {
        return view('pages.author.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('pages.author.edit', compact('author'));
    }

    public function update(AuthPostRequest $request, Author $author)
    {
        $validated = $request->validated();
        $author->update($validated);
        return redirect()
            ->route('authors.show', $author)
            ->with('success', 'Autor alterado com sucesso');
    }

    public function destroy(Author $author)
    {
        if (count($author->books) > 0) {
            return redirect()
                ->back()
                ->with('error', 'Não é possível deletar um autor vinculado a um livro');
        }
        $author->delete();
        return redirect()
            ->route('authors.index')
            ->with('success', 'Autor deletado com sucesso');
    }
}
