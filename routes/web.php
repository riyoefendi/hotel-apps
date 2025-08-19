<?php

use App\Http\Controllers\ControllerDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login_action', [\App\Http\Controllers\LoginController::class, 'loginAction'])->name('login_action');

Route::get('call_name', [\App\Http\Controllers\BelajarController::class, 'call_name']);
Route::get('tambah', [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::post('store_tambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('store_tambah');
Route::get('kurang', [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('kurang');
Route::post('store_kurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('store_kurang');
Route::get('bagi', [\App\Http\Controllers\BelajarController::class, 'bagi'])->name('bagi');
Route::post('store_bagi', [\App\Http\Controllers\BelajarController::class, 'storeBagi'])->name('store_bagi');
Route::get('kali', [\App\Http\Controllers\BelajarController::class, 'kali'])->name('kali');
Route::post('store_kali', [\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('store_kali');

Route::resource('dashboard', ControllerDashboard::class);
