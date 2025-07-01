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
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PromoteController;
use App\Models\Category;

Route::get('/', [AdController::class, 'index'])->name('marketplace.index');
Route::resource('ads', AdController::class)->except(['index']);

Route::post('ads/{ad}/promote', [PromoteController::class, 'update'])->name('promote.update');

Route::get('user/{user}', [AccountController::class, 'show'])->name('account.show')
    ->middleware('auth');
Route::get('inbox/{conversation?}', [InboxController::class, 'index'])
    ->name('account.inbox')
    ->middleware('auth');
Route::post('inbox', [InboxController::class, 'store'])
    ->name('inbox.store')
    ->middleware('auth');

Route::post('/ads/{ad}/bids', [BidController::class, 'store'])->name('bid.store');

Route::post('conversation/store', [ConversationController::class, 'store'])
    ->name('conversation.store')
    ->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

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