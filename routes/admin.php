<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\SchoolYearController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;

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

define('PAGINATION_COUNT', 15);

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function (){
    Route::get('login', [AuthController::class, 'getLogin'])->name('admin.get_login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('admin.post_login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){

    Route::get('/', [AuthController::class, 'index'])->name('admin.home');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'admins'], function (){
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/add', [AdminController::class, 'add'])->name('admin.add');
        Route::post('/add', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    });

    Route::group(['prefix' => 'class_rooms'], function (){
        Route::get('/', [ClassRoomController::class, 'index'])->name('class_room.index');
        Route::get('/add', [ClassRoomController::class, 'add'])->name('class_room.add');
        Route::post('/add', [ClassRoomController::class, 'store'])->name('class_room.store');
        Route::get('/edit/{id}', [ClassRoomController::class, 'edit'])->name('class_room.edit');
        Route::post('/edit/{id}', [ClassRoomController::class, 'update'])->name('class_room.update');
        Route::get('/delete/{id}', [ClassRoomController::class, 'delete'])->name('class_room.delete');
    });

    Route::group(['prefix' => 'offices'], function (){
        Route::get('/', [OfficeController::class, 'index'])->name('office.index');
        Route::get('/add', [OfficeController::class, 'add'])->name('office.add');
        Route::post('/add', [OfficeController::class, 'store'])->name('office.store');
        Route::get('/edit/{id}', [OfficeController::class, 'edit'])->name('office.edit');
        Route::post('/edit/{id}', [OfficeController::class, 'update'])->name('office.update');
        Route::get('/delete/{id}', [OfficeController::class, 'delete'])->name('office.delete');
    });

    Route::group(['prefix' => 'subjects'], function (){
        Route::get('/', [SubjectController::class, 'index'])->name('subject.index');
        Route::get('/add', [SubjectController::class, 'add'])->name('subject.add');
        Route::post('/add', [SubjectController::class, 'store'])->name('subject.store');
        Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::post('/edit/{id}', [SubjectController::class, 'update'])->name('subject.update');
        Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');
    });

    Route::group(['prefix' => 'activities'], function (){
        Route::get('/', [ActivityController::class, 'index'])->name('activity.index');
        Route::get('/add', [ActivityController::class, 'add'])->name('activity.add');
        Route::post('/add', [ActivityController::class, 'store'])->name('activity.store');
        Route::get('/edit/{id}', [ActivityController::class, 'edit'])->name('activity.edit');
        Route::post('/edit/{id}', [ActivityController::class, 'update'])->name('activity.update');
        Route::get('/delete/{id}', [ActivityController::class, 'delete'])->name('activity.delete');
    });

    Route::group(['prefix' => 'school_years'], function (){
        Route::get('/', [SchoolYearController::class, 'index'])->name('school_year.index');
        Route::get('/add', [SchoolYearController::class, 'add'])->name('school_year.add');
        Route::post('/add', [SchoolYearController::class, 'store'])->name('school_year.store');
        Route::get('/edit/{id}', [SchoolYearController::class, 'edit'])->name('school_year.edit');
        Route::post('/edit/{id}', [SchoolYearController::class, 'update'])->name('school_year.update');
        Route::get('/delete/{id}', [SchoolYearController::class, 'delete'])->name('school_year.delete');
    });

    Route::group(['prefix' => 'teachers'], function (){
        Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/add', [TeacherController::class, 'add'])->name('teacher.add');
        Route::post('/add', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::post('/edit/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::get('/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
    });

    Route::group(['prefix' => 'students'], function (){
        Route::get('/', [StudentController::class, 'index'])->name('student.index');
        Route::get('/add', [StudentController::class, 'add'])->name('student.add');
        Route::post('/add', [StudentController::class, 'store'])->name('student.store');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('/edit/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
    });

    Route::group(['prefix' => 'parents'], function (){
        Route::get('/', [ParentController::class, 'index'])->name('parent.index');
        Route::get('/add', [ParentController::class, 'add'])->name('parent.add');
        Route::post('/add', [ParentController::class, 'store'])->name('parent.store');
        Route::get('/edit/{id}', [ParentController::class, 'edit'])->name('parent.edit');
        Route::post('/edit/{id}', [ParentController::class, 'update'])->name('parent.update');
        Route::get('/delete/{id}', [ParentController::class, 'delete'])->name('parent.delete');
    });

    Route::post('/school_year_subject', [StudentController::class, 'loadSchoolYearSubject'])->name('get.school_year.subject');


});
Route::get('/', function () {
    return view('welcome');
});
