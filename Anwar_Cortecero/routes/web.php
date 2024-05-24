<?php
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\cursoController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



route::resource('/cursos',cursoController::class);

route::resource('/estudiantes', EstudianteController::class);
