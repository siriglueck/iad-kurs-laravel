<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Harry Potter and the Philosophers Stone',
            'author' => 'J. K. Rowling',
            'isbn' => '0-7475-3274-5',
            'published_year' => 1997
        ]);
        Book::create([
            'title' => 'Harry Potter and the Chamber of Secrets',
            'author' => 'J. K. Rowling',
            'isbn' => '0-7475-3849-2',
            'published_year' => 1997
        ]);
        Book::create([
            'title' => 'Harry Potter and the Prisoner of Azkaban',
            'author' => 'J. K. Rowling',
            'isbn' => '0-7475-4215-5',
            'published_year' => 1998
        ]);
        Book::create([
            'title' => 'Harry Potter and the Goblet of Fire',
            'author' => 'J. K. Rowling',
            'isbn' => '0-7475-5099-9',
            'published_year' => 1999
        ]);
        Book::create([
            'title' => 'Harry Potter and the Order of the Phoenix',
            'author' => 'J. K. Rowling',
            'isbn' => '0-7475-5100-6',
            'published_year' => 2000
        ]);
        Book::create([
            'title' => 'Harry Potter and the Half‑Blood Prince',
            'author' => 'J. K. Rowling',
            'isbn' => '0-7475-8110-X',
            'published_year' => 2003
        ]);
        Book::create([
            'title' => 'Harry Potter and the Deathly Hallows',
            'author' => 'J. K. Rowling',
            'isbn' => '0-7475-9105-9',
            'published_year' => 2005
        ]);
    }
}
