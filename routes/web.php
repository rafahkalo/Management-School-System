<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FreeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\FinalExamController;
use App\Http\Controllers\WeakTableController;
use App\Http\Controllers\SubjectController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

##################ROUTES FOR TEACHERS#################
Route::group(['prefix' => 'teacher',/* 'middleware' => 'auth'*/], function(){

//ارجاع كل معلمين
Route::get('get',[TeacherController::class,'index']);//finish
//تعديل معومات استاذ
Route::post('update/{id}',[TeacherController::class,'update'])->name('teacher.edite');//finish
//حذف استاذ
 Route::get('delete/{id}',[TeacherController::class,'destroy']);//finish
 //معلومات استاذ معين
 Route::get('show/{id}',[TeacherController::class,'show']);//finish

 Route::get('class/{id}',[TeacherController::class,'teacherclass']);//finish
 //حفظ استاذ مع مواده
 Route::post('insert',[TeacherController::class,'store'])->name('Tinsert');//finish
 //ارجاع المواد الموجودة ليتم الاختيار منها
 Route::get('getall',[SubjectController::class,'index']);

 Route::get('subject/{id}',[TeacherController::class,'teachersubjects']);
 Route::get('techer_subject/{id}',[TeacherController::class,'teachersubjects']);
 Route::get('all',[TeacherController::class,'allteacher']);



 Route::get('count',[TeacherController::class,'countTeacher']);



});
//Route::post('good',[TeacherController::class,'store'])->name('good');
Route::post('update/{id}',[TeacherController::class,'update'])->name('teacher');
Route::put('test/{id}',[TeacherController::class,'update'])->name('test');
###################STUDENTS############
Route::group(['prefix' => 'student',/* 'middleware' => 'auth'*/], function(){
Route::post('insert',[StudentController::class,'store']);//finish
Route::get('delete/{id}',[StudentController::class,'destroy']);//finish
Route::get('show/{id}',[StudentController::class,'show']);//finish
Route::post('update/{id}',[StudentController::class,'update']);//finish

Route::get('count',[StudentController::class,'countStudent']);

});

###################FREE##################
Route::group(['prefix' => 'free',/* 'middleware' => 'auth'*/], function(){
    //اضافة قسط
    Route::post('insert',[FreeController::class,'store']);//finish
     //ارجاع اقساط طالب معي
    Route::get('show/{id}',[FreeController::class,'show']);//finish

    });
####################ROUTE FOR CLASSROOM#######################
Route::group(['prefix' => 'classroom', /*'middleware' => 'auth'*/], function(){
    //ارجاع كل الصفوف الموجودة
    Route::get('getall',[ClassRoomController::class,'index']);
    //ارجاع طلاب صف معين
Route::get('show/{id}',[ClassRoomController::class,'show']);//finish
//انشاء صف جديد
Route::post('insert',[ClassRoomController::class,'store']);
Route::get('delete/{id}',[ClassRoomController::class,'destroy']);//finish
Route::get('all',[ClassRoomController::class,'allclass']);
});


Route::group(['prefix' => 'expense',/* 'middleware' => 'auth'*/], function(){

    Route::get('get',[ExpensesController::class,'index']);//finish

    Route::post('insert',[ExpensesController::class,'store']);//finish
    });

Route::group(['prefix' => 'final',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[FinalExamController::class,'store']);//finish
    Route::get('show/{id}',[FinalExamController::class,'show']);//finish
    });


Route::group(['prefix' => 'weak',/* 'middleware' => 'auth'*/], function(){

    Route::post('insert',[WeakTableController::class,'store']);//finish
    Route::get('show/{id}',[WeakTableController::class,'show']);//finish
    });

    Route::get('test',[FreeController::class,'test']);

##################################SUBJECT#####################
Route::group(['prefix' => 'subject',/* 'middleware' => 'auth'*/], function(){
// add sunject
    Route::post('insert',[SubjectController::class,'store']);//finish
//معرفة اساتذة مادة معينة
    Route::get('show/{id}',[SubjectController::class,'show']);//finish
    Route::get('getall',[SubjectController::class,'index']);//finish

    });

    Route::get('/add', function () {
        return view('Teacher.addTeacher');
    });
    Route::get('test',[FreeController::class,'searchfree']);//finish
