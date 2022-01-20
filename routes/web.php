<?php

use App\Exports\DosenExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DosenlbController;
// use App\Http\Controllers\MatkulController;
use App\Http\Controllers\DosenController;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\GeneralController;

use App\Http\Controllers\FullCalenderController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/data_fakultas', [FakultasController::class, 'index'])->name('data_fakultas');
Route::get('/data_fakultas/add', [FakultasController::class, 'add']);
Route::post('/data_fakultas/insert', [FakultasController::class, 'insert']);
Route::get('/data_fakultas/edit{id}', [FakultasController::class, 'edit']);
Route::post('/data_fakultas/update/{id}', [FakultasController::class, 'update']);
Route::get('/data_fakultas/delete/{id}', [FakultasController::class, 'delete']);


// Route::get('/data_fakultas/detail/{id}', [FakultasController::class, 'detail']);


Route::get('/data_jurusan', [JurusanController::class, 'index'])->name('data_jurusan');
Route::get('/data_jurusan/add', [JurusanController::class, 'add']);
Route::post('/data_jurusan/insert', [JurusanController::class, 'insert']);
Route::get('/data_jurusan/edit{id}', [JurusanController::class, 'edit']);
Route::post('/data_jurusan/update/{id}', [JurusanController::class, 'update']);
Route::get('/data_jurusan/delete/{id}', [JurusanController::class, 'delete']);

// Route::get('/data_matkul', [MatkulController::class, 'index'])->name('data_matkul');
// Route::get('/data_matkul/add', [MatkulController::class, 'add']);
// Route::post('/data_matkul/insert', [MatkulController::class, 'insert']);
// Route::get('/data_matkul/edit{id}', [MatkulController::class, 'edit']);
// Route::post('/data_matkul/update/{id}', [MatkulController::class, 'update']);
// Route::get('/data_matkul/delete/{id}', [MatkulController::class, 'delete']);

Route::get('/data_dosen', [DosenController::class, 'index'])->name('data_dosen');
Route::get('/data_dosen/add', [DosenController::class, 'add']);
Route::post('/data_dosen/insert', [DosenController::class, 'insert']);
Route::get('/data_dosen/edit{id}', [DosenController::class, 'edit']);
Route::post('/data_dosen/update/{id}', [DosenController::class, 'update']);
Route::get('/data_dosen/delete/{id}', [DosenController::class, 'delete']);

Route::get('data_dosen/export', function()
{
    return Excel::download(new DosenExport, 'dosen.xlsx');
})->name('exportdosen');

// Route Data Dosen Luar Biasa(Halaman Home)
Route::get('/data_dosenlb', [DosenlbController::class, 'indexDosen']);
Route::get('/tambah_dosenlb', [DosenlbController::class, 'form']);
Route::post('/tambah_dosenlb', [DosenlbController::class, 'tambahDosen']);
Route::get('/edit_dosenlb/{nip}', [DosenlbController::class, 'edit_dosenlb']);
Route::post('/edit_dosenlb/{nip}', [DosenlbController::class, 'update_dosenlb']);
Route::get('/delete/{nip}', [DosenlbController::class, 'delete']);
Route::get('/view_dosenlb/{nip}', [DosenlbController::class, 'view_dosen']);

Route::get('/checkbox', [GeneralController::class, 'checkboxPage']);
Route::post('/checkbox', [GeneralController::class, 'insertCheckbox']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/percobaan', 'percobaan');

Route::get('full-calender', [FullCalenderController::class, 'index']);

Route::post('full-calender/action', [FullCalenderController::class, 'action']);
