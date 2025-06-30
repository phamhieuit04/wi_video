<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/auth', [AuthController::class, 'auth']);
Route::get('/auth/google/callback', [AuthController::class, 'googleAuth']);

Route::get('/home', function () {
    return '<h1>Loggin thanh cong!</h1>';
});