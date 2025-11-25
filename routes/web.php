<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// CONTROLADORES DEL SISTEMA
use App\Http\Controllers\NivelController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\SeccionController;

use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MatriculaController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas (requieren login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PERFIL DE USUARIO
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | MÓDULO: ESTRUCTURA COLEGIAL
    |--------------------------------------------------------------------------
    | Contiene 3 tablas: niveles, grados y secciones
    */

    // Vista principal del módulo
    Route::get('/estructura-colegial', [NivelController::class, 'index'])
        ->name('estructura.index');


    // -------- NIVELES --------
    Route::get('/estructura-colegial/niveles', [NivelController::class, 'index'])->name('niveles.index');
    Route::get('/estructura-colegial/niveles/crear', [NivelController::class, 'create'])->name('niveles.create');
    Route::post('/estructura-colegial/niveles', [NivelController::class, 'store'])->name('niveles.store');
    Route::get('/estructura-colegial/niveles/{id}/editar', [NivelController::class, 'edit'])->name('niveles.edit');
    Route::put('/estructura-colegial/niveles/{id}', [NivelController::class, 'update'])->name('niveles.update');
    Route::delete('/estructura-colegial/niveles/{id}', [NivelController::class, 'destroy'])->name('niveles.destroy');

    // -------- GRADOS --------
    Route::get('/estructura-colegial/grados', [GradoController::class, 'index'])->name('grados.index');
    Route::get('/estructura-colegial/grados/crear', [GradoController::class, 'create'])->name('grados.create');
    Route::post('/estructura-colegial/grados', [GradoController::class, 'store'])->name('grados.store');
    Route::get('/estructura-colegial/grados/{id}/editar', [GradoController::class, 'edit'])->name('grados.edit');
    Route::put('/estructura-colegial/grados/{id}', [GradoController::class, 'update'])->name('grados.update');
    Route::delete('/estructura-colegial/grados/{id}', [GradoController::class, 'destroy'])->name('grados.destroy');

    // -------- SECCIONES --------
    Route::get('/estructura-colegial/secciones', [SeccionController::class, 'index'])->name('secciones.index');
    Route::get('/estructura-colegial/secciones/crear', [SeccionController::class, 'create'])->name('secciones.create');
    Route::post('/estructura-colegial/secciones', [SeccionController::class, 'store'])->name('secciones.store');
    Route::get('/estructura-colegial/secciones/{id}/editar', [SeccionController::class, 'edit'])->name('secciones.edit');
    Route::put('/estructura-colegial/secciones/{id}', [SeccionController::class, 'update'])->name('secciones.update');
    Route::delete('/estructura-colegial/secciones/{id}', [SeccionController::class, 'destroy'])->name('secciones.destroy');

    /*
    |--------------------------------------------------------------------------
    | MÓDULO: CURSOS
    |--------------------------------------------------------------------------
    */

    Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('/cursos/crear', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/{id}/editar', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/{id}', [CursoController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');
    Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show');

    /*
    |--------------------------------------------------------------------------
    | MÓDULO: DOCENTES
    |--------------------------------------------------------------------------
    */

    // DOCENTES
    Route::get('/docentes', [DocenteController::class, 'index'])->name('docentes.index');
    Route::get('/docentes/crear', [DocenteController::class, 'create'])->name('docentes.create');
    Route::post('/docentes', [DocenteController::class, 'store'])->name('docentes.store');
    Route::get('/docentes/{id}', [DocenteController::class, 'show'])->name('docentes.show');   // ← antes de edit
    Route::get('/docentes/{id}/editar', [DocenteController::class, 'edit'])->name('docentes.edit');
    Route::put('/docentes/{id}', [DocenteController::class, 'update'])->name('docentes.update');
    Route::delete('/docentes/{id}', [DocenteController::class, 'destroy'])->name('docentes.destroy');



    /*
    |--------------------------------------------------------------------------
    | MÓDULO: ALUMNOS
    |--------------------------------------------------------------------------
    */

    Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
    Route::get('/alumnos/crear', [AlumnoController::class, 'create'])->name('alumnos.create');
    Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
    Route::get('/alumnos/{id}/editar', [AlumnoController::class, 'edit'])->name('alumnos.edit');
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');

    /*
    |--------------------------------------------------------------------------
    | MÓDULO: MATRÍCULAS
    |--------------------------------------------------------------------------
    */

    Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas.index');
    Route::get('/matriculas/crear', [MatriculaController::class, 'create'])->name('matriculas.create');
    Route::post('/matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');
    Route::get('/matriculas/{id}/editar', [MatriculaController::class, 'edit'])->name('matriculas.edit');
    Route::put('/matriculas/{id}', [MatriculaController::class, 'update'])->name('matriculas.update');
    Route::delete('/matriculas/{id}', [MatriculaController::class, 'destroy'])->name('matriculas.destroy');
});


require __DIR__ . '/auth.php';
