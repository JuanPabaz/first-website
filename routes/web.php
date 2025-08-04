<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::redirect('/', '/home');

Route::get('/', function () {
    return view('layout');
});

Route::get('/home', [ProjectController::class, 'index'])->name("inicio");

Route::get('/services', function () {
    return view('services');
})->name("servicios");

Route::get('/us', function () {
    return view('us');
})->name("somos");

Route::get('/projects', [ProjectController::class, 'list'])->name("proyectos");

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name("proyectos.detalle");


