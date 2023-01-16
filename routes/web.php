<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeTrainingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UserController::class,'login']);
Route::post('login',[UserController::class, 'dologin']);
Route::get('logout',[UserController::class, 'logout']);

Route::get('dashboard',[DashboardController::class,'index']);

Route::get('vacancy/add',[VacancyController::class,'create']);
Route::post('vacancy/add',[VacancyController::class,'store']);
Route::get('vacancy/update/{id}', [VacancyController::class,'edit']);
Route::post('vacancy/update/{id}', [VacancyController::class,'update']);
Route::get('vacancies',[VacancyController::class,'index']);

Route::get('training/add',[TrainingController::class,'create']);
Route::post('training/add',[TrainingController::class,'store']);
Route::get('training/update/{id}',[TrainingController::class,'edit']);
Route::post('training/update/{id}',[TrainingController::class,'update']);
Route::get('trainings',[TrainingController::class,'index']);

Route::get('add/employee/training',[EmployeeTrainingController::class,'create']);
Route::post('add/employee/training',[EmployeeTrainingController::class,'store']);
Route::post('employee/training/delete/{id}',[EmployeeTrainingController::class,'delete']);
Route::get('employee/trainings',[EmployeeTrainingController::class,'index']);
