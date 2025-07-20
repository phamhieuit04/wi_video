<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/auth'));

Route::group(['prefix' => 'auth'], function () {
    Route::get('/', [AuthController::class, 'auth'])->name('login');
    Route::get('/{provider}/redirect', [AuthController::class, 'redirect']);
    Route::get('/{provider}/callback', [AuthController::class, 'callback']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/logout', [HomeController::class, 'logout']);
});