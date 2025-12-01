<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BookController::class,'index'])->name('home');
Route::get('/books', [BookController::class,'index'])->name('books');