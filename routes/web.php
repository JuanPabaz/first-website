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

Route::get('/us', function () {
    return view('us');
})->name("somos");

Route::get('/projects', function () {
    return view('projects');
})->name("proyectos");
