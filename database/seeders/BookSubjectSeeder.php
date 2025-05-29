<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class BookSubjectSeeder extends Seeder
{
    public function run(): void
    {
        Book::all()->each(function ($book) {
            $subjects = Subject::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $book->subjects()->attach($subjects);
        });
    }
}
