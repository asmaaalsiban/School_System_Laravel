<?php

use App\Http\Controllers\API\V1\ClassRoomController;
use App\Http\Controllers\API\V1\StudentController;
use App\Http\Controllers\API\V1\TeacherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware(['auth'])->group(function () {
    Route::resource('classrooms', ClassRoomController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('teachers', TeacherController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});