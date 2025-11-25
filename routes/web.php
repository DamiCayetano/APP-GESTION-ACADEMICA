<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/estructura-colegial', function () {
    return view('estructura-colegial.index');
})->middleware(['auth'])->name('estructura.index');

Route::get('/cursos', function () {
    return view('cursos.index');
})->middleware(['auth'])->name('cursos.index');

Route::get('/docentes', function () {
    return view('docentes.index');
})->middleware(['auth'])->name('docentes.index');

Route::get('/alumno', function () {
    return view('alumno.index');
})->middleware(['auth'])->name('alumno.index');

Route::get('/matriculas', function () {
    return view('matriculas.index');
})->middleware(['auth'])->name('matriculas.index');


require __DIR__.'/auth.php';
