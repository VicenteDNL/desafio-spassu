<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class () extends Migration {
    public function up(): void
    {
        DB::statement('
            CREATE VIEW report_books_summary AS
            SELECT
                year_publication,
                COUNT(*) as total_books,
                AVG(amount) as avg_price
            FROM books
            GROUP BY year_publication
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS report_books_summary');
    }
};
