<?php

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FreeController;
use App\Http\Controllers\AbsenceController ;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\FinalExamController;
use App\Http\Controllers\WeakTableController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\ResualtController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'student',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[StudentController::class,'store']);//finish
    Route::post('update/{id}',[StudentController::class,'update']);//finish



    });
    Route::get('show/{id}',[ClassRoomController::class,'show']);
Route::group(['prefix' => 'classroom',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[ClassRoomController::class,'store']);//finish

    Route::get('show/{id}',[ClassRoomController::class,'show']);//finish

    });

Route::group(['prefix' => 'absence',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[AbsenceController::class,'store']);//finish

    Route::get('show/{id}',[AbsenceController::class,'show']);//finish

    });



Route::group(['prefix' => 'subject',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[SubjectController::class,'store']);//finish

    Route::get('show/{id}',[SubjectController::class,'show']);//finish

    });

Route::group(['prefix' => 'mark',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[ResualtController::class,'store']);//finish

    Route::get('delete/{id}',[ResualtController::class,'destroy']);//finish

    });

Route::group(['prefix' => 'teacher',/* 'middleware' => 'auth'*/], function(){

    Route::post('up/{id}',[TeacherController::class,'update']);//finish

    Route::get('show/{id}',[TeacherController::class,'show']);//finish

    });

Route::group(['prefix' => 'expense',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[ExpensesController::class,'store']);//finish

    Route::post('index',[ExpensesController::class,'index']);//finish

    });

Route::group(['prefix' => 'free',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[FreeController::class,'store']);//finish
    Route::post('update',[FreeController::class,'update']);//finish
    Route::post('search',[FreeController::class,'searchSfree']);//finish

    Route::post('ins',[FreeController::class,'storee']);

    });


Route::group(['prefix' => 'homework',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[HomeworkController::class,'store']);//finish


    });
Route::group(['prefix' => 'final',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[FinalExamController::class,'store']);//finish


    });
Route::group(['prefix' => 'weak',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[WeakTableController::class,'store']);//finish


    });


    Route::get('test',[FreeController::class,'test']);

