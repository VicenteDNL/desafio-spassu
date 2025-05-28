<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
{

    public function run(): void
    {

        $book6 = Book::where('title', 'Dom Casmurro')->first();
        $book6->authors()->attach(Author::where('name', 'Machado de Assis')->first());

        $book7 = Book::where('title', 'A Hora da Estrela')->first();
        $book7->authors()->attach(Author::where('name', 'Clarice Lispector')->first());

        $book8 = Book::where('title', 'Capitães da Areia')->first();
        $book8->authors()->attach(Author::where('name', 'Jorge Amado')->first());

        $book9 = Book::where('title', 'O Alquimista')->first();
        $book9->authors()->attach(Author::where('name', 'Paulo Coelho')->first());

        $book10 = Book::where('title', 'Viagem')->first();
        $book10->authors()->attach(Author::where('name', 'Mário de Andrade')->first());

        $book11 = Book::where('title', 'Grande Sertão: Veredas')->first();
        $book11->authors()->attach(Author::where('name', 'João Guimarães Rosa')->first());

        $book12 = Book::where('title', 'Memórias Póstumas de Brás Cubas')->first();
        $book12->authors()->attach(Author::where('name', 'Machado de Assis')->first());

        $book13 = Book::where('title', 'Vidas Secas')->first();
        $book13->authors()->attach(Author::where('name', 'Graciliano Ramos')->first());

        $book14 = Book::where('title', 'O Cortiço')->first();
        $book14->authors()->attach(Author::where('name', 'Aluísio Azevedo')->first());

        $book15 = Book::where('title', 'Iracema')->first();
        $book15->authors()->attach(Author::where('name', 'José de Alencar')->first());

        $book16 = Book::where('title', 'O Guarani')->first();
        $book16->authors()->attach(Author::where('name', 'José de Alencar')->first());

        $book17 = Book::where('title', 'Senhora')->first();
        $book17->authors()->attach(Author::where('name', 'José de Alencar')->first());

        $book18 = Book::where('title', 'A Moreninha')->first();
        $book18->authors()->attach(Author::where('name', 'Joaquim Manuel de Macedo')->first());

        $book19 = Book::where('title', 'Lucíola')->first();
        $book19->authors()->attach(Author::where('name', 'José de Alencar')->first());

        $book20 = Book::where('title', 'O Primo Basílio')->first();
        $book20->authors()->attach(Author::where('name', 'José Maria de Eça de Queirós')->first());

        $book21 = Book::where('title', 'A Cidade e as Serras')->first();
        $book21->authors()->attach(Author::where('name', 'José Maria de Eça de Queirós')->first());

        $book22 = Book::where('title', 'A Relíquia')->first();
        $book22->authors()->attach(Author::where('name', 'José de Alencar')->first());

        $book23 = Book::where('title', 'Os Sertões')->first();
        $book23->authors()->attach(Author::where('name', 'Euclides da Cunha')->first());

        $book24 = Book::where('title', 'Triste Fim de Policarpo Quaresma')->first();
        $book24->authors()->attach(Author::where('name', 'Lima Barreto')->first());

        $book25 = Book::where('title', 'O Ateneu')->first();
        $book25->authors()->attach(Author::where('name', 'Raul Pompeia')->first());

        $book26 = Book::where('title', 'Inocência')->first();
        $book26->authors()->attach(Author::where('name', 'Visconde de Taunay')->first());

        $book27 = Book::where('title', 'Contos de Machado de Assis')->first();
        $book27->authors()->attach(Author::where('name', 'Machado de Assis')->first());

        $book28 = Book::where('title', 'Auto da Compadecida')->first();
        $book28->authors()->attach(Author::where('name', 'Ariano Suassuna')->first());

        $book29 = Book::where('title', 'O Pagador de Promessas')->first();
        $book29->authors()->attach(Author::where('name', 'Dias Gomes')->first());

        $book30 = Book::where('title', 'Quincas Borba')->first();
        $book30->authors()->attach(Author::where('name', 'Machado de Assis')->first());
    }
}
