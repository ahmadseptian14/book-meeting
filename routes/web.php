<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RuanganController;

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('ruangan')->group(function () {
        Route::get('/', [RuanganController::class, 'index'])->name('ruangan.index');
        Route::get('/booking', [RuanganController::class, 'booking'])->name('ruangan.booking');
        Route::post('/booking-store', [RuanganController::class, 'bookingStore'])->name('ruangan.booking-store');

    });
});
