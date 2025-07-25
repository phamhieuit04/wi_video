<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}/redirect', [AuthController::class, 'redirect']);
    Route::get('/{provider}/callback', [AuthController::class, 'callback']);
});