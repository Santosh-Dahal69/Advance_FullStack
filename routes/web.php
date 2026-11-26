k<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Student CRUD
Route::resource('students', StudentController::class);

// Course CRUD
Route::resource('courses', CourseController::class);
