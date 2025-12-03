<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookListController;
use App\Http\Controllers\SiteController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BookController::class,'index'])->name('books');
Route::get('/books', [BookListController::class,'index'])->name('books.index');

Route::get('/welcome', function () {
    $siteController = new SiteController();
    return $siteController->welcome();
})->name('library.welcome');

Route::get('/team', function () {
    $siteController = new SiteController();
    return $siteController->team();
})->name('library.team');

Route::get('/contact', function () {
    $siteController = new SiteController();
    return $siteController->contact();
})->name('library.contact');
