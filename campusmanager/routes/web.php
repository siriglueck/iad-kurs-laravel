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

// Dieser Route wird von Formular eingeladen
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');

// weiterleiten
Route::get('/students/{student}', [StudentsController::class,'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentsController::class,'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');

Route::get('/courses', function () {
    return 'Kursliste folgt';
})->name('courses.index');
