<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SiteController;

Route::get('/', [BookController::class,'index'])->name('index');
Route::get('/books', [BookController::class,'showAll'])->name('books.index');
Route::get('/books/create', [BookController::class,'create'])->name('books.create');

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
