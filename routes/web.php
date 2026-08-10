<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


// LOGIN
Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);


// LOGOUT
Route::post('/logout', [AuthController::class, 'logout']);


// STUDENT CRUD - LOGIN REQUIRED
Route::middleware('auth')->group(function () {

    Route::get('/students', [StudentController::class, 'index'])
        ->name('students.index');

    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');

    Route::put('/students/{student}', [StudentController::class, 'update'])
        ->name('students.update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])
        ->name('students.destroy');

});
