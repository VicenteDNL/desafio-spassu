<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::insert([

            [
                'title'            => 'Dom Casmurro',
                'publisher'        => 'Editora ABC',
                'edition'          => 1,
                'year_publication' => '1899',
                'amount'           => 42.90,
            ],
            [
                'title'            => 'A Hora da Estrela',
                'publisher'        => 'Editora XYZ',
                'edition'          => 1,
                'year_publication' => '1977',
                'amount'           => 35.00,
            ],
            [
                'title'            => 'Capitães da Areia',
                'publisher'        => 'Companhia das Letras',
                'edition'          => 2,
                'year_publication' => '1937',
                'amount'           => 50.00,
            ],
            [
                'title'            => 'O Alquimista',
                'publisher'        => 'Editora Rocco',
                'edition'          => 3,
                'year_publication' => '1988',
                'amount'           => 45.50,
            ],
            [
                'title'            => 'Viagem',
                'publisher'        => 'Editora ArteNova',
                'edition'          => 1,
                'year_publication' => '1939',
                'amount'           => 38.75,
            ],
            [
                'title'            => 'Grande Sertão: Veredas',
                'publisher'        => 'Nova Fronteira',
                'edition'          => 1,
                'year_publication' => '1956',
                'amount'           => 59.90,
            ],
            [
                'title'            => 'Memórias Póstumas de Brás Cubas',
                'publisher'        => 'Editora 34',
                'edition'          => 2,
                'year_publication' => '1881',
                'amount'           => 34.90,
            ],
            [
                'title'            => 'Vidas Secas',
                'publisher'        => 'José Olympio',
                'edition'          => 1,
                'year_publication' => '1938',
                'amount'           => 42.00,
            ],
            [
                'title'            => 'O Cortiço',
                'publisher'        => 'Ática',
                'edition'          => 3,
                'year_publication' => '1890',
                'amount'           => 29.90,
            ],
            [
                'title'            => 'Iracema',
                'publisher'        => 'L&PM',
                'edition'          => 1,
                'year_publication' => '1865',
                'amount'           => 24.90,
            ],
            [
                'title'            => 'O Guarani',
                'publisher'        => 'Martin Claret',
                'edition'          => 2,
                'year_publication' => '1857',
                'amount'           => 28.00,
            ],
            [
                'title'            => 'Senhora',
                'publisher'        => 'Saraiva',
                'edition'          => 1,
                'year_publication' => '1875',
                'amount'           => 32.50,
            ],
            [
                'title'            => 'A Moreninha',
                'publisher'        => 'Scipione',
                'edition'          => 4,
                'year_publication' => '1844',
                'amount'           => 21.00,
            ],
            [
                'title'            => 'Lucíola',
                'publisher'        => 'Moderna',
                'edition'          => 3,
                'year_publication' => '1862',
                'amount'           => 30.00,
            ],
            [
                'title'            => 'O Primo Basílio',
                'publisher'        => 'Companhia Editora Nacional',
                'edition'          => 2,
                'year_publication' => '1878',
                'amount'           => 37.90,
            ],
            [
                'title'            => 'A Cidade e as Serras',
                'publisher'        => 'Editora Globo',
                'edition'          => 1,
                'year_publication' => '1901',
                'amount'           => 33.00,
            ],
            [
                'title'            => 'A Relíquia',
                'publisher'        => 'Edições Loyola',
                'edition'          => 1,
                'year_publication' => '1887',
                'amount'           => 31.50,
            ],
            [
                'title'            => 'Os Sertões',
                'publisher'        => 'Companhia das Letras',
                'edition'          => 5,
                'year_publication' => '1902',
                'amount'           => 65.00,
            ],
            [
                'title'            => 'Triste Fim de Policarpo Quaresma',
                'publisher'        => 'Editora Brasiliense',
                'edition'          => 3,
                'year_publication' => '1915',
                'amount'           => 38.70,
            ],
            [
                'title'            => 'O Ateneu',
                'publisher'        => 'Editora Ática',
                'edition'          => 2,
                'year_publication' => '1888',
                'amount'           => 27.90,
            ],
            [
                'title'            => 'Inocência',
                'publisher'        => 'Editora Record',
                'edition'          => 1,
                'year_publication' => '1872',
                'amount'           => 29.90,
            ],
            [
                'title'            => 'Contos de Machado de Assis',
                'publisher'        => 'Nova Aguilar',
                'edition'          => 1,
                'year_publication' => '1906',
                'amount'           => 44.90,
            ],
            [
                'title'            => 'Auto da Compadecida',
                'publisher'        => 'Agir',
                'edition'          => 6,
                'year_publication' => '1955',
                'amount'           => 39.90,
            ],
            [
                'title'            => 'O Pagador de Promessas',
                'publisher'        => 'Civilização Brasileira',
                'edition'          => 3,
                'year_publication' => '1960',
                'amount'           => 36.00,
            ],
            [
                'title'            => 'Quincas Borba',
                'publisher'        => 'Penguin Companhia',
                'edition'          => 1,
                'year_publication' => '1891',
                'amount'           => 40.00,
            ],

        ]);
    }
}
