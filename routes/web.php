<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth'])->group(function () {

    Route::get('/hitung', [HitungController::class, 'index'])->name('hitung.index');
    Route::resource('/nilai', NilaiController::class)->parameters(['nilai' => 'id_alternatif']);
    Route::resource('/kriteria', KriteriaController::class)->parameters(['kriteria' => 'kriteria']);
    Route::resource('/alternatif', AlternatifController::class)->parameters(['alternatif' => 'alternatif']);

    Route::get('/', [PageController::class, 'index'])->name('home');

    Route::post('/import', [ImportController::class, 'importExcel'])->name('import');

    Route::get('/download-template', [ImportController::class, 'downloadTemplate'])->name('template.download');

    Route::post('/import-alternatif', [ImportController::class, 'importAlternatif'])->name('import.alternatif');

    Route::get('/download-alternatif-template', [ImportController::class, 'downloadAlternatifTemplate'])->name('template.alternatif');

    Route::post('/import-nilai', [ImportController::class, 'importNilai'])->name('import.nilai');

    Route::get('/download-nilai-template', [ImportController::class, 'downloadNilaiTemplate'])->name('template.nilai');

    Route::post('/import-all', [ImportController::class, 'importAll'])->name('import.all');
    Route::get('/download-all-template', [ImportController::class, 'downloadAllTemplate'])->name('template.all');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');