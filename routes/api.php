<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;

Route::apiResource('students', StudentController::class)->names('api.students');
Route::apiResource('courses', CourseController::class)->names('api.courses');
