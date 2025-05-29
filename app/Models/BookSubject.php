<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookSubject extends Pivot
{
    public $timestamps = true;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
