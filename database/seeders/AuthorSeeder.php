<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::insert([
            ['name' => 'Clarice Lispector'],
            ['name' => 'Jorge Amado'],
            ['name' => 'Paulo Coelho'],
            ['name' => 'Mário de Andrade'],
            ['name' => 'João Guimarães Rosa'],
            ['name' => 'Graciliano Ramos'],
            ['name' => 'Aluísio Azevedo'],
            ['name' => 'Joaquim Manuel de Macedo'],
            ['name' => 'José Maria de Eça de Queirós'],
            ['name' => 'José de Alencar'],
            ['name' => 'Euclides da Cunha'],
            ['name' => 'Lima Barreto'],
            ['name' => 'Raul Pompeia'],
            ['name' => 'Visconde de Taunay'],
            ['name' => 'Ariano Suassuna'],
            ['name' => 'Dias Gomes'],
            ['name' => 'Machado de Assis'],
        ]);
    }
}
