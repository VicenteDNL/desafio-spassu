<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthPostRequest;
use App\Models\Author;
use Illuminate\Http\Request;

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
        return  redirect()->route('authors.show', ['author' => $author]);
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
        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        return redirect()->route('authors.index');
    }
}
