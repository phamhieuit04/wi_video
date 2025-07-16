<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/', [AuthController::class, 'auth'])->name('login');
    Route::get('/{provider}/redirect', [AuthController::class, 'redirect']);
    Route::get('/{provider}/callback', [AuthController::class, 'callback']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', fn() => "<h1>Loggin thanh cong!</h1>");
});