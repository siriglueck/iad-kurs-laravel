<?php
namespace App\Http\Controllers;

class SiteController
{
    public function welcome() {
        return view('welcome');
    }
    
    public function team() {
        return view('team');
    }
    
    public function contact() {
        return view('contact');
    }
}