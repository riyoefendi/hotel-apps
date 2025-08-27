<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('welcome');
});

// get, post, put,delete (melihat/read, insert/create, update, delete)
Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login_action', [\App\Http\Controllers\LoginController::class, 'loginAction'])->name('login_action');


Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
Route::resource('room', \App\Http\Controllers\RoomController::class);
Route::resource('reservation', \App\Http\Controllers\ReservationsController::class);

Route::get('get-room-by-category/{id}', [\App\Http\Controllers\ReservationsController::class, 'getRoomByCategory'])
    ->name('get-room-by-category');

Route::get("call_name", [\App\Http\Controllers\BelajarController::class, 'getCallName']);
Route::get("tambah", [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::get("kurang", [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('kurang');
Route::post('store_tambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('store_tambah');
Route::post('store_kurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('store_kurang');

Route::get("guestinformation", [GuestController::class, "index"]);
Route::get("guestinformation/create", [GuestController::class, "create"]);
Route::post("guestinformation/store", [GuestController::class, "store"])->name('guest.store');
Route::get("guestinformation/edit/{id}", [GuestController::class, "edit"])->name("guest.edit");
