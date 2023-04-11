<?php

use App\Models\Survey;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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







route::group(["middleware"=>'auth'],function (){

    Route::get("/",[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    Route::resource("/users",\App\Http\Controllers\UserController::class);

    Route::resource("/clients",\App\Http\Controllers\ClientController::class);
    Route::resource("/transactions",\App\Http\Controllers\TransactionController::class);
    Route::resource("/sms",\App\Http\Controllers\SmsController::class);
    Route::get("/search-client",[\App\Http\Controllers\ClientController::class,'search'])->name("search.client");



});

Auth::routes();

