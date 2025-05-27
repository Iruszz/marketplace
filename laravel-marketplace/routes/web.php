<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\BidController;

Route::get('/', [AdController::class, 'index'])->name('marketplace.index');
Route::get('ads/create', [AdController::class, 'create'])->name('ads.create');
Route::post('ads/store', [AdController::class, 'store'])->name('ads.store');
Route::get('ads/{ad}', [AdController::class, 'show'])->name('ads.show');
Route::get('ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::patch('ads/{ad}', [AdController::class, 'update'])->name('ads.update');
Route::get('user/{user}/dashboard', [AdController::class, 'dashboard'])
    ->name('marketplace.dashboard')
    ->middleware('auth');
Route::delete('ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');

// Route::get('bid/{ad}', [BidController::class, 'index'])->name('bid.index');
// Route::get('bid/create', [BidController::class, 'create'])->name('bid.create');
Route::post('bid/store', [BidController::class, 'store'])->name('bid.store');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::post('logout', [LoginController::class, 'destroy'])->name('logout.destroy');

Route::get('forgot-password', [ForgotPasswordController::class, 'index'])
    ->middleware('guest')
    ->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'reset'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'update'])
    ->middleware('guest')
    ->name('password.update');