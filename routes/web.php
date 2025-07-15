<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/auth', [AuthController::class, 'auth'])->name('login');
Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [AuthController::class, 'callback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', fn() => "<h1>Loggin thanh cong!</h1>");
});