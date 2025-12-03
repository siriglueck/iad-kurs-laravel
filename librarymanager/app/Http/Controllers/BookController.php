<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public $timestamps = false;
    public function index() 
    {
        $books = Book::orderBy('published_year')->get();
        
        /**
         * Ruft die View home.blade.php auf und übergibt Variableninhalte
         */
        return view('books.index',[
            'books' => $books
        ]);
    }

}
