<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookListController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BookController::class,'index'])->name('books');
Route::get('/booklist', [BookListController::class,'index'])->name('booklist.index');