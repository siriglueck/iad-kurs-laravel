<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hallo Laravel!';
});

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/about', [HomeController::class,'about'])->name('about');

Route::get('/students', [StudentsController::class,'index'])->name('students.index');

Route::get('/students/create', [StudentsController::class,'create'])->name('students.create');

Route::get('/courses', function () {
    return 'Kursliste folgt';
})->name('courses.index');
