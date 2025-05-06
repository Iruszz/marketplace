<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdController;

Route::get('/', [AdController::class, 'index'])->name('marketplace.index');
Route::get('create', [AdController::class, 'create'])->name('marketplace.create');
Route::get('user/{user}/dashboard', [AdController::class, 'dashboard'])
    ->name('marketplace.dashboard')
    ->middleware('auth');

Route::get('login', [LoginController::class, 'index'])->name('login.index');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::post('logout', [LoginController::class, 'destroy'])->name('logout.destroy');

Route::get('forgot-password', [ForgotPasswordController::class, 'index'])
    ->middleware('guest')->name('password.request');

Route::post('forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'reset'])
    ->middleware('guest')->name('password.reset');

Route::post('reset-password', [ResetPasswordController::class, 'update'])
    ->middleware('guest')->name('password.update');