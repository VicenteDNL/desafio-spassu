<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        DB::statement("
            CREATE VIEW report_author_book_count AS
            SELECT
                a.id,
                a.name,
                COUNT(ba.book_id) AS total_books
            FROM authors a
            JOIN book_author ba ON a.id = ba.author_id
            GROUP BY a.id, a.name;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS report_author_book_count");
    }
};
