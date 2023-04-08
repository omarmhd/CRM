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




Route::get('show-my-evaluation',[\App\Http\Controllers\UserController::class,'showMyEvaluation'])->name('showMyEvaluation')->middleware("auth");



route::group(["prefix"=>"admin"],function (){

    Route::get("/dashboard",[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    Route::resource("/clients",\App\Http\Controllers\ClientController::class);
    Route::resource("/transactions",\App\Http\Controllers\TransactionController::class);
    Route::resource("/sms",\App\Http\Controllers\SmsController::class);
    Route::get("/search-client",[\App\Http\Controllers\ClientController::class,'search'])->name("search.client");





    route::group([""],function () {
//Route::post('/employee',[\App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');
        Route::resource("/employee", EmployeeController::class);
        Route::resource("/users", \App\Http\Controllers\UserController::class);

        Route::resource("/sections", \App\Http\Controllers\SectionController::class);
        Route::post("/question/{section}", [\App\Http\Controllers\SectionController::class, 'storeQuestion'])->name("question.store");


        Route::resource("/surveys", \App\Http\Controllers\SurveyController::class);

        /*start ::::::::::::::::activated surverys*/

        //:show pages status
        Route::get("activated-surveys/newIndex", [\App\Http\Controllers\ActivatedSurveyController::class, 'newIndex'])->name('activated-surveys.newIndex');
        Route::get("activated-surveys/evaluatedIndex", [\App\Http\Controllers\ActivatedSurveyController::class, 'evaluatedIndex'])->name('activated-surveys.evaluatedIndex');
        Route::get("activated-surveys/acceptedIndex", [\App\Http\Controllers\ActivatedSurveyController::class, 'acceptedIndex'])->name('activated-surveys.acceptedIndex');
        Route::get("activated-surveys/approvalIndex", [\App\Http\Controllers\ActivatedSurveyController::class, 'approvalIndex'])->name('activated-surveys.approvalIndex');
        Route::get("activated-surveys/returnIndex", [\App\Http\Controllers\ActivatedSurveyController::class, 'returnIndex'])->name('activated-surveys.returnIndex');
        Route::get("activated-surveys/needApprovalIndex", [\App\Http\Controllers\ActivatedSurveyController::class, 'needApprovalIndex'])->name('activated-surveys.needApprovalIndex');


        //:all activated survey
        Route::resource('activated-surveys', \App\Http\Controllers\ActivatedSurveyController::class);
        Route::put("activated-surveys/evaluation/{activated_survey}", [\App\Http\Controllers\ActivatedSurveyController::class, 'evaluation'])->name('evaluation.update');

        //:change status
        Route::get("activated-surveys/{type?}/{id}", [\App\Http\Controllers\ActivatedSurveyController::class, 'updateStatus'])->name('status.update');

//    Route::get("activated-surveys/employee-accepted/{id}",[\App\Http\Controllers\ActivatedSurveyController::class,'updateAccepted'])->name('accepted.update');
        Route::get("activated-surveys/approval/show/{id}", [\App\Http\Controllers\ActivatedSurveyController::class, 'indexApprovalPage'])->name('approval.show');

        /*end ::::::::::::::::activated surverys*/


        //Route::post('/employee',[\App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');


        Route::resource("/users", \App\Http\Controllers\UserController::class);
        Route::get('show-my-evaluation', [\App\Http\Controllers\UserController::class, 'showMyEvaluation'])->name('showMyEvaluation');

        Route::resource("/sections", \App\Http\Controllers\SectionController::class);
        Route::post("/question/{section}", [\App\Http\Controllers\SectionController::class, 'storeQuestion'])->name("question.store");

        Route::resource("/surveys", \App\Http\Controllers\SurveyController::class);


        Route::resource('activated-surveys', \App\Http\Controllers\ActivatedSurveyController::class);
        Route::get('print/{id}', [\App\Http\Controllers\ActivatedSurveyController::class,'print'])->name("print");


    });
});



//route::group(['middleware'=>'auth','canAny:evaluator'],function (){
//
//    Route::get("",[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
//
//    Route::get("activated-surveys/newIndex",[\App\Http\Controllers\ActivatedSurveyController::class,'newIndex'])->name('activated-surveys.newIndex');
//    Route::get("activated-surveys/evaluatedIndex",[\App\Http\Controllers\ActivatedSurveyController::class,'evaluatedIndex'])->name('activated-surveys.evaluatedIndex');
//    Route::get("activated-surveys/acceptedIndex",[\App\Http\Controllers\ActivatedSurveyController::class,'acceptedIndex'])->name('activated-surveys.acceptedIndex');
//    Route::get("activated-surveys/approvalIndex",[\App\Http\Controllers\ActivatedSurveyController::class,'approvalIndex'])->name('activated-surveys.approvalIndex');
//    Route::get("activated-surveys/returnIndex",[\App\Http\Controllers\ActivatedSurveyController::class,'returnIndex'])->name('activated-surveys.returnIndex');
//    Route::get("activated-surveys/needApprovalIndex",[\App\Http\Controllers\ActivatedSurveyController::class,'needApprovalIndex'])->name('activated-surveys.needApprovalIndex');
//
//    //:all activated survey
//    Route::resource('activated-surveys',\App\Http\Controllers\ActivatedSurveyController::class)->only(['put','index','show']);
//    Route::put("activated-surveys/evaluation/{activated_survey}",[\App\Http\Controllers\ActivatedSurveyController::class,'evaluation'])->name('evaluation.update');
//
//    //:change status
//    Route::get("activated-surveys/{type?}/{id}",[\App\Http\Controllers\ActivatedSurveyController::class,'updateStatus'])->name('status.update');
//
////    Route::get("activated-surveys/employee-accepted/{id}",[\App\Http\Controllers\ActivatedSurveyController::class,'updateAccepted'])->name('accepted.update');
//    Route::get("activated-surveys/approval/show/{id}",[\App\Http\Controllers\ActivatedSurveyController::class,'indexApprovalPage'])->name('approval.show');
//
//    /*end ::::::::::::::::activated surverys*/
//
//
//    //Route::post('/employee',[\App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');
//
//
//    Route::get('show-my-evaluation',[\App\Http\Controllers\UserController::class,'showMyEvaluation'])->name('showMyEvaluation');
//
//
//
//
//});
//Route::resource("/employee",EmployeeController::class);
Auth::routes();

