<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() 
    {
        $headline = 'Willkommen im „LibraryManager – Startseite"';
        $today = now()->format('d.m.Y');
        
        /**
         * Ruft die View home.blade.php auf und übergibt Variableninhalte
         */
        return view('books', [
            'headline' => $headline,
            'today'    => $today
        ]);
    }
}
