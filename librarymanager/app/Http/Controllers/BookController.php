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
        
        return view('index');
    }

    public function showAll() 
    {
        // generiert eine DB-Abfrage z.B. SELECT * FROM students ORDER BY lastname
        $books = Book::orderBy('published_year')->get();
        return view('books.index',[
            'books' => $books
        ]);
    
    }

    public function create()
    {
        return view('books.create');
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
