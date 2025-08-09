<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/auth');
});

Route::get('/{route}', fn() => view('app'));
