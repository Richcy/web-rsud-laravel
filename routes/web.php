<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/backend', function () {
    return view('admin/index');
});

Route::get('/buttons', function () {
    return view('admin/buttons');
});

Route::get('/cards', function () {
    return view('admin/cards');
});
