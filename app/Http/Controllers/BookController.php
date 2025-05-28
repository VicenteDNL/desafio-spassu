<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookPostRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Subject;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class BookController extends Controller
{
    public function index()
    {
        return view('pages.book.index', ['books' => Book::orderBy('updated_at')->paginate(10)]);
    }

    public function create()
    {
        return view(
            'pages.book.create',
            [
                'authors' => Author::all(),
                'subjects' => Subject::all(),
            ]
        );
    }

    public function store(BookPostRequest $request)
    {

        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $book = new Book($validated);
            $book->save();
            $book->authors()->attach($validated['authors']);
            $book->subjects()->attach($validated['subjects']);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('books.show', ['book' => $book]);
    }

    public function show(Book $book)
    {
        return view('pages.book.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::whereDoesntHave('books', function ($query) use ($book) {
            $query->where('book_id', $book->id);
        })->get();

        $subjects = Subject::whereDoesntHave('books', function ($query) use ($book) {
            $query->where('book_id', $book->id);
        })->get();;

        return view('pages.book.edit', compact('book', 'authors', 'subjects'));
    }

    public function update(BookPostRequest $request, Book $book)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $book->update($validated);
            $book->authors()->sync($validated['authors']);
            $book->subjects()->sync($validated['subjects']);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('books.show', $book);
    }

    public function destroy(Book $book)
    {
        return redirect()->route('books.index');
    }

    public function destroyAuthor(Book $book, Author $author)
    {
        $book->authors()->detach($author->id);
        return redirect()->back();
    }

    public function destroySubject(Book $book, Subject $subject)
    {
        $book->subjects()->detach($subject->id);
        return redirect()->back();
    }
}
