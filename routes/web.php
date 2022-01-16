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

Route::get('course', [\App\Http\Controllers\ElectiveController::class, 'index'])->name('courses.index');

Route::get('homework', [\App\Http\Controllers\PayController::class, 'index'])->name('homework.index');
Route::get('homework/create', [\App\Http\Controllers\PayController::class, 'create'])->name('homework.create');
Route::get('homework/{id}/edit', [\App\Http\Controllers\PayController::class, 'edit'])->name('homework.edit');
Route::post('homework', [\App\Http\Controllers\PayController::class, 'store'])->name('homework.store');
Route::patch('homework/{id}',[\App\Http\Controllers\PayController::class,'update'])->name('homework.update');


Route::prefix('teacher')->group(function () {
    Route::get('/', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teacher.dashboard.index');  //進入後台管理介面的路由

    Route::get('courses', [\App\Http\Controllers\CourseController::class, 'index'])->name('teacher.courses.index');  //候台列出所有文章的路由
    Route::get('courses/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('teacher.courses.create');  //候台產生新增表單的路由
    Route::get('courses/{id}/edit', [\App\Http\Controllers\CourseController::class, 'edit'])->name('teacher.courses.edit');  //候台生產修改表單的路由
    Route::post('courses',[\App\Http\Controllers\CourseController::class,'store'])->name('teacher.courses.store'); //新增資料
    Route::patch('courses/{id}',[\App\Http\Controllers\CourseController::class,'update'])->name('teacher.courses.update'); //更新資料
    Route::get('courses/{id}',[\App\Http\Controllers\CourseController::class,'delete'])->name('teacher.courses.destroy'); //刪除資料

    Route::get('homeworks', [\App\Http\Controllers\HomeworkController::class, 'index'])->name('teacher.homeworks.index');  //候台列出所有文章的路由
    Route::get('homeworks/create', [\App\Http\Controllers\HomeworkController::class, 'create'])->name('teacher.homeworks.create');  //候台產生新增表單的路由
    Route::get('homeworks/{id}/edit', [\App\Http\Controllers\HomeworkController::class, 'edit'])->name('teacher.homeworks.edit');  //候台生產修改表單的路由
    Route::post('homeworks',[\App\Http\Controllers\HomeworkController::class,'store'])->name('teacher.homeworks.store'); //新增資料
    Route::get('homeworks/{homework}',[\App\Http\Controllers\HomeworkController::class,'show'])->name('teacher.homeworks.show'); //顯示資料
    Route::patch('homeworks/{id}',[\App\Http\Controllers\HomeworkController::class,'update'])->name('teacher.homeworks.update'); //更新資料
    Route::get('homeworks/{id}',[\App\Http\Controllers\HomeworkController::class,'delete'])->name('teacher.homeworks.destroy'); //刪除資料
});
