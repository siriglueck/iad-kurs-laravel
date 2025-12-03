<?php
namespace App\Http\Controllers;

class SiteController
{
    public function welcome() {
        return view('books.welcome');
    }
    
    public function team() {
        return view('books.team');
    }
    
    public function contact() {
        return view('books.contact');
    }
}