<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hallo Laravel!';
});

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/about', [HomeController::class,'about'])->name('about');