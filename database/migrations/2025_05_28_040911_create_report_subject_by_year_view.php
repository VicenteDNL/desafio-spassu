<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW report_subject_by_year AS
            SELECT
                b.year_publication,
                s.description,
                COUNT(b.id) AS total_books
            FROM books b
                    JOIN book_subject bs ON b.id = bs.book_id
                    JOIN subjects s ON bs.subject_id = s.id
            GROUP BY b.year_publication, s.description;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS report_subject_by_year");
    }
};
