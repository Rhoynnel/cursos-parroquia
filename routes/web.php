<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\CatequesisController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inscripcion', [InscripcionController::class, 'index'])->name('inscripcion.index');
Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripcion.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/centro', [CentrosController::class, 'index'])->name('centro.index');
    Route::get('/curso', [CursosController::class, 'index'])->name('curso.index');
    Route::post('/centro', [CentrosController::class, 'store'])->name('centro.store');
    Route::post('/curso', [CursosController::class, 'store'])->name('curso.store');
    Route::put('/centro/{centro}', [CentrosController::class, 'update'])->name('centro.update');
    Route::put('/curso/{curso}', [CursosController::class, 'update'])->name('curso.update');
    Route::get('/catequesis', [CatequesisController::class, 'index'])->name('catequesis.index');
    Route::get('/representante', [CatequesisController::class, 'index'])->name('representante.index');
    Route::get('/estudiante', [CatequesisController::class, 'index'])->name('estudiante.index');
});

require __DIR__.'/auth.php';
