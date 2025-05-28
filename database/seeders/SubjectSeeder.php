<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::insert([
            ['description' => 'Romance'],
            ['description' => 'Poesia'],
            ['description' => 'Filosofia'],
            ['description' => 'Autoajuda'],
            ['description' => 'Conto'],
        ]);
    }
}
