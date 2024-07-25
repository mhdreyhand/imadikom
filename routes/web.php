<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DokumentasiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Divisi
Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi');

// Kepengurusan
Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
Route::get('/pengurus/create', [PengurusController::class, 'create'])->name('pengurus.create');
Route::post('/pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
Route::get('/pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])->name('pengurus.edit');
Route::put('/pengurus/{pengurus}', [PengurusController::class, 'update'])->name('pengurus.update');
Route::delete('/pengurus/{pengurus}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');
Route::get('/pengurus/{pengurus}', [PengurusController::class, 'show'])->name('pengurus.show');

// Keanggotaan
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{anggota}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('/anggota/{anggota}', [AnggotaController::class, 'show'])->name('anggota.show');

// Alumni
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
Route::get('/alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store');
Route::get('/alumni/{alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
Route::put('/alumni/{alumni}', [AlumniController::class, 'update'])->name('alumni.update');
Route::delete('/alumni/{alumni}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
Route::get('/alumni/{alumni}', [AlumniController::class, 'show'])->name('alumni.show');


// Proker
Route::resource('/proker', ProkerController::class);

// Jadwal
Route::resource('/jadwal', JadwalController::class);
Route::put('/jadwal/{id}/update-status', [JadwalController::class, 'updateJadwalStatus']);


// Dokumentasi
Route::resource('/dokumentasi', DokumentasiController::class);

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');
