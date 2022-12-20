<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/temp',[VacancyController::class,'index']);
//Route::get('/user', [VacancyController::class, 'index']);

Route::get('/',[UserController::class,'login']);
Route::post('login',[UserController::class, 'dologin']);
Route::get('logout',[UserController::class, 'logout']);

Route::get('dashboard',[DashboardController::class,'index']);

Route::get('vacancy/add',[VacancyController::class,'create']);
Route::post('vacancy/add',[VacancyController::class,'store']);
