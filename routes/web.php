<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
})->name('dashboard');

Route::resource('books', BookController::class);
Route::delete('books/{book}/authors/{author}', [BookController::class, 'destroyAuthor'])->name('books.authors.destroy');
Route::delete('books/{book}/subjects/{subject}', [BookController::class, 'destroySubject'])->name('books.subjects.destroy');
Route::resource('authors', AuthorController::class);
Route::resource('subjects', SubjectController::class);
