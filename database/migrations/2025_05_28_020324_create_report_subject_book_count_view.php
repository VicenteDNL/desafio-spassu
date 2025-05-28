<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        DB::statement("
            CREATE VIEW report_subject_book_count AS
            SELECT
                s.id,
                s.description,
                COUNT(bs.book_id) AS total_books
            FROM subjects s
            JOIN book_subject bs ON s.id = bs.subject_id
            GROUP BY s.id, s.description;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS report_subject_book_count");
    }
};
