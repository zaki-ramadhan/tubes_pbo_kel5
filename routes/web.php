<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('ulasans', UlasanController::class);
    // Route::resource('pesanans', PesananController::class);
});
