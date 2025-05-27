<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'publisher',
        'edition',
        'year_publication',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author')->using(BookAuthor::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->using(BookSubject::class);
    }
}
