<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MataKuliahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini tempat kamu mendaftarkan route aplikasi web kamu.
| Semua route ini akan dimuat oleh RouteServiceProvider.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// === Route Profil ===
Route::get('/profile/{nama}/{nim}/{kelas}', [ProfileController::class, 'profile']);

// === Route User ===
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

// === Route Mata Kuliah ===
Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index'); // ✅ tambahkan name di sini
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');