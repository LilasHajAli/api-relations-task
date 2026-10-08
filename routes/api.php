<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicalFileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('students' , [StudentController::class , 'store']);
Route::get('students/{id}' , [StudentController::class , 'show']);
Route::post('students/{student_id}/medicalFile', [MedicalFileController::class, 'store']);
Route::put('students/{student_id}/medicalFile', [MedicalFileController::class, 'update']);


Route::post('categories',[CategoryController::class , 'store']);
Route::post('categories/{category_id}/products' , [ProductController::class , 'store']);
Route::get('categories/{category_id}/products' , [ProductController::class , 'index']);
Route::get('products/{id}' , [ProductController::class , 'show']);





