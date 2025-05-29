<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register.create');
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('register.store');
    Route::get('login', [AuthSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthSessionController::class, 'store'])
        ->name('login.store');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::get('/', function () {
    return view('pages.dashboard.index');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::delete('books/{book}/authors/{author}', [BookController::class, 'destroyAuthor'])->name('books.authors.destroy');
    Route::delete('books/{book}/subjects/{subject}', [BookController::class, 'destroySubject'])->name('books.subjects.destroy');
    Route::resource('authors', AuthorController::class);
    Route::resource('subjects', SubjectController::class);
    Route::post('logout', [AuthSessionController::class, 'destroy'])
    ->name('logout');
});
