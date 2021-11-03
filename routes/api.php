<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('student', [StudentController::class, 'index']);
Route::post('student', [StudentController::class, 'store']);
Route::get('student/{id?}', [StudentController::class, 'show']);
Route::patch('student/{id?}', [StudentController::class, 'update']);
Route::delete('student/{id?}', [StudentController::class, 'destroy']);
