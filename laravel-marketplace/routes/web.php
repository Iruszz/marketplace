<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('marketplace.index');
});

Route::get('register', [UserController::class, 'create'])->name('register.create');
Route::post('register', [UserController::class, 'store'])->name('register.store');

Route::get('login', [SessionController::class, 'index'])->name('login.index');
Route::post('login', [SessionController::class, 'store'])->name('login.store');

Route::post('logout', [SessionController::class, 'destroy'])->name('logout.destroy');