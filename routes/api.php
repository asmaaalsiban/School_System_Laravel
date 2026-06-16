<?php

use App\Http\Controllers\API\V1\ClassroomController;
use App\Http\Controllers\API\V1\StudentController;
use App\Http\Controllers\API\V1\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix("v1")->group(function () {
    Route::apiResource('classrooms', ClassroomController::class);
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('students', StudentController::class);
});