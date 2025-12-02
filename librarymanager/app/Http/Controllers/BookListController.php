<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookListController extends Controller
{
    public $timestamps = false;
    public function index() 
    {
        // generiert eine DB-Abfrage z.B. SELECT * FROM students ORDER BY lastname
        $books = Book::orderBy('published_year')->get();
        return view('booklist.index',[
            'books' => $books
        ]);
    
    }
}


    
