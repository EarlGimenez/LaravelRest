<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('student', [StudentController::class,'index']);
Route::get('student/{id}', [StudentController::class,'getStudent']);
Route::post('student', [StudentController::class,'addStudent']);
Route::put('student/edit/{id}', [StudentController::class,'updateStudent']);
Route::delete('student/delete/{id}', [StudentController::class, 'deleteStudent']);