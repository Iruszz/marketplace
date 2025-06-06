<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InboxController;
use App\Models\Category;

Route::get('/', [AdController::class, 'index'])->name('marketplace.index');
Route::get('ads/create', [AdController::class, 'create'])->name('ads.create');
Route::post('ads/store', [AdController::class, 'store'])->name('ads.store');
Route::get('ads/{ad}', [AdController::class, 'show'])->name('ads.show');
Route::get('ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::patch('ads/{ad}', [AdController::class, 'update'])->name('ads.update');
Route::delete('ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');

Route::get('user/{user}/index', [AccountController::class, 'index'])
    ->name('account.index')
    ->middleware('auth');
Route::get('user/{user}/inbox', [InboxController::class, 'index'])
    ->name('account.inbox')
    ->middleware('auth');
Route::post('inbox/store', [InboxController::class, 'store'])
    ->name('inbox.store')
    ->middleware('auth');

// Route::get('user/{user}/index', [AccountController::class, 'index'])
// ->name('account.index')
// ->middleware('auth');

Route::post('/ads/{ad}/bids', [BidController::class, 'store'])->name('bid.store');

Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');

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