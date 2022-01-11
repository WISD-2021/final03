<?php

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum','verified'])->get('/student',[App\Http\Controllers\StudentController::class,'index'])->name('student.index');

Route::get('/course',function(){
    return view('course');
});

Route::prefix('teacher')->group(function () {
    Route::get('/', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teacher.dashboard.index');  //進入後台管理介面的路由

    Route::get('courses', [\App\Http\Controllers\CourseController::class, 'index'])->name('teacher.courses.index');  //候台列出所有文章的路由
    Route::get('courses/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('teacher.courses.create');  //候台產生新增表單的路由
    Route::get('courses/{id}/edit', [\App\Http\Controllers\CourseController::class, 'edit'])->name('teacher.courses.edit');  //候台生產修改表單的路由
    Route::post('courses',[\App\Http\Controllers\CourseController::class,'store'])->name('teacher.courses.store'); //新增資料
    Route::patch('courses/{id}',[\App\Http\Controllers\CourseController::class,'update'])->name('teacher.courses.update'); //更新資料
    Route::get('courses/{id}',[\App\Http\Controllers\CourseController::class,'delete'])->name('teacher.courses.destroy'); //刪除資料
});
