<?php

use App\Exports\DosenExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DosenlbController;
use App\Http\Controllers\DosenController;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\FullCalenderController;
use Illuminate\Support\Facades\Auth;


// Route Halaman Utama
Route::get('/', [HomeController::class, 'index']);

// Route Data Fakultas
Route::get('/data_fakultas', [FakultasController::class, 'index'])->name('data_fakultas');
Route::get('/data_fakultas/add', [FakultasController::class, 'add']);
Route::post('/data_fakultas/insert', [FakultasController::class, 'insert']);
Route::get('/data_fakultas/edit{id}', [FakultasController::class, 'edit']);
Route::post('/data_fakultas/update/{id}', [FakultasController::class, 'update']);
Route::get('/data_fakultas/delete/{id}', [FakultasController::class, 'delete']);

// Route Data Jurusan
Route::get('/data_jurusan', [JurusanController::class, 'index'])->name('data_jurusan');
Route::get('/data_jurusan/add', [JurusanController::class, 'add']);
Route::post('/data_jurusan/insert', [JurusanController::class, 'insert']);
Route::get('/data_jurusan/edit{id}', [JurusanController::class, 'edit']);
Route::post('/data_jurusan/update/{id}', [JurusanController::class, 'update']);
Route::get('/data_jurusan/delete/{id}', [JurusanController::class, 'delete']);

// Route Data Dosen
Route::get('/data_dosen', [DosenController::class, 'index'])->name('data_dosen');
Route::get('/data_dosen/add', [DosenController::class, 'add']);
Route::post('/data_dosen/insert', [DosenController::class, 'insert']);
Route::get('/data_dosen/edit/{id}', [DosenController::class, 'edit']);
Route::post('/data_dosen/update/{id}', [DosenController::class, 'update']);
Route::get('/data_dosen/delete/{id}', [DosenController::class, 'delete']);
Route::get('data_dosen/export', function() {
    return Excel::download(new DosenExport, 'dosen.xlsx');
})->name('exportdosen');

// Route Data Dosen Luar Biasa
Route::get('/data_dosenlb', [DosenlbController::class, 'index'])->name('data_dosenlb');
Route::get('/tambah_dosenlb', [DosenlbController::class, 'add']);
Route::post('/tambah_dosenlb', [DosenlbController::class, 'insert']);
Route::get('/data_dosenlb/edit/{id}', [DosenlbController::class, 'edit']);
Route::post('/data_dosenlb/update/{id}', [DosenlbController::class, 'update']);
Route::get('/data_dosenlb/delete/{id}', [DosenlbController::class, 'delete']);
Route::get('/view_dosenlb/{nip}', [DosenlbController::class, 'view']);

// Route Halaman Checkbox
Route::get('/checkbox', [GeneralController::class, 'checkboxPage']);
Route::post('/checkbox', [GeneralController::class, 'insertCheckbox']);

// Route Halaman Full Calendar
Route::get('full-calender', [FullCalenderController::class, 'index']);
Route::post('full-calender/action', [FullCalenderController::class, 'action']);

// Route Untuk Halaman Percobaan
Route::view('/percobaan', 'percobaan');

// Route Halaman Utama Setelah Login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Default Laravel Auth Routes
Auth::routes();
