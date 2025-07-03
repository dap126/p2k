<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login')-> middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('login.action');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout.action');

Route::get('/logout', function () {
    return view('logout');
})->name('logout');

Route::get('/dasbord', function () {
    return view('dasbord');
})->name('dasbord')->middleware('auth');

Route::get('/dasbordAdmin', function () {
    return view('dasbordAdmin');
})->name('dasbordAdmin');

Route::get('/dasbordAdmin', [LaporanController::class, 'index']);

Route::post('/lapor', [LaporanController::class, 'store'])->middleware('auth');

Route::resource('laporan', LaporanController::class)->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/home', function () {
    return view('home');
})->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth')->name('profil');
Route::get('/status-pengajuan', [ProfilController::class, 'statusPengajuan'])->name('status.pengajuan');
Route::put('/laporan/{id}/status', [LaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
