<?php

use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('report')->group(function () {
    Route::get('book-summary', [ReportController::class, 'bookSummary'])->name('book-summary');
    Route::get('author-book-count', [ReportController::class, 'authorBookCount'])->name('author-book-count');
    Route::get('subject-book-count', [ReportController::class, 'subjectBookCount'])->name('subject-book-count');
    Route::get('author-count-subject', [ReportController::class, 'authorCountSubject'])->name('author-count-subject');
    Route::get('subject-by-year', [ReportController::class, 'subjectByYear'])->name('subject-by-year');
});
