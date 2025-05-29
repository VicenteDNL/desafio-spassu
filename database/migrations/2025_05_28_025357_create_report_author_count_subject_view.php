<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class () extends Migration {
    public function up(): void
    {
        DB::statement('
            CREATE VIEW report_author_count_subject AS
                SELECT a.id,
                    a.name,
                    COUNT(ba.book_id) AS total_books,
                    s.description
                FROM authors a
                        JOIN book_author ba ON a.id = ba.author_id
                        JOIN books b ON ba.book_id = b.id
                        JOIN book_subject bs ON ba.book_id = bs.book_id
                        JOIN subjects s ON bs.subject_id = s.id
                GROUP BY a.id, a.name, s.description;
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS report_author_count_subject');
    }
};
