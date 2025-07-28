<?php

use App\Helpers\ApiResponse;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/{route}', fn() => view('app'));