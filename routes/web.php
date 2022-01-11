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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum','verified'])->get('/student',[App\Http\Controllers\StudentController::class,'index'])->name('student.index');

Route::get('/course',function(){
    return view('course');
});

Route::prefix('teacher')->group(function () {
    Route::get('/', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teacher.dashboard.index');  //進入後台管理介面的路由

//    Route::get('posts', [\App\Http\Controllers\AdminPostsController::class, 'index'])->name('teacher.posts.index');  //候台列出所有文章的路由
//    Route::get('posts/create', [AdminPostsController::class, 'create'])->name('teacher.posts.create');  //候台產生新增表單的路由
//    Route::get('posts/{id}/edit', [AdminPostsController::class, 'edit'])->name('teacher.posts.edit');  //候台生產修改表單的路由
//    Route::post('posts',[AdminPostsController::class,'store'])->name('teacher.posts.store'); //新增資料
//    Route::patch('posts/{post}',[AdminPostsController::class,'update'])->name('teacher.posts.update'); //更新資料
//    Route::delete('posts/{post}',[AdminPostsController::class,'destroy'])->name('teacher.posts.destroy'); //刪除資料
});
