<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgresProyekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistikProyekController;
use App\Http\Controllers\ProyekController;

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

/*
|--------------------------------------------------------------------------
| PROGRES PROYEK
|--------------------------------------------------------------------------
*/
Route::get('/progress-proyek', [ProgresProyekController::class, 'pilihProyek'])->name('progress.pilih');
Route::get('/progress-proyek/{id}', [ProgresProyekController::class, 'index'])->name('progress.index');
Route::post('/progress-proyek', [ProgresProyekController::class, 'store'])->name('progress.store');
Route::delete('/progress-proyek/{id}', [ProgresProyekController::class, 'destroy'])->name('progress.destroy');




Route::get('/statistik', [StatistikProyekController::class, 'index'])
    ->name('statistik.index');

Route::get('/statistik/{id}', [StatistikProyekController::class, 'show'])
    ->name('statistik.show');



Route::resource('proyek', ProyekController::class);
Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
Route::get('/proyek/tambah', [ProyekController::class, 'create'])->name('proyek.create');
Route::post('/proyek', [ProyekController::class, 'store'])->name('proyek.store');
Route::get('/proyek/{id}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
Route::put('/proyek/{id}', [ProyekController::class, 'update'])->name('proyek.update');
Route::delete('/proyek/{id}', [ProyekController::class, 'destroy'])->name('proyek.destroy');
