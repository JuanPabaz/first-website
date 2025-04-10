<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//Parameters using Route
Route::get('/portfolio', function () {
    return view('portfolio');
});