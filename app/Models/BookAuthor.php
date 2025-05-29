<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookAuthor extends Pivot
{
    public $timestamps = true;
    protected $table = 'book_author';

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
