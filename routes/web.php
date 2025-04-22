<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/home', function () {
    return view('home');
})->name("inicio");

Route::get('/services', function () {
    return view('services');
})->name("servicios");


