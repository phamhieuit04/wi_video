<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}/redirect', [AuthController::class, 'redirect']);
    Route::get('/{provider}/callback', [AuthController::class, 'callback']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/get-info', [HomeController::class, 'getInfo']);
    Route::post('/upload-video', [HomeController::class, 'uploadVideo']);
    Route::get('/logout', [HomeController::class, 'logout']);
});
