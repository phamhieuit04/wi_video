<?php

use App\Helpers\ApiResponse;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/{route}', fn() => view('app'));

// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index']);
// });