<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProdiController;

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);

Route::post('/mahasiswa', [MahasiswaController::class, 'store']);

Route::middleware(['role:1,2'])->group(function () {
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
});

Route::middleware(['role:1'])->group(function () {
    Route::resource('prodi', ProdiController::class)->except(['index']);
});

Route::middleware(['role:1'])->group(function () {
    Route::get('/admin', function () {
        return "Halaman Admin";
    });
});

Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::resource('mata-kuliah', MataKuliahController::class)
        ->only(['index']);
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('mata-kuliah', MataKuliahController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['mata-kuliah' => 'id']);
});

Route::get('/login', [AuthPageController::class, 'login']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/myhome', [HomeController::class, 'myHome']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);

Route::middleware(['auth', 'role:1,2'])
    ->get('/nilai', fn () => view('nilai'));

Route::middleware(['auth', 'checkRole:1,2'])->group(function () {
    Route::get('/admin-dosen', fn () => view('admin'));
});

Route::middleware(['auth', 'isAdministrator'])
    ->group(function () {
        Route::get('/admin', fn () => view('admin'));
    });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hallo', function () {
    return 'Hallo, Helga Dianova Ardhani';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
