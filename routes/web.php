<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
//        'middleware'=>['admin']
    ]
    , function () {
    Route::get('admin/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('admin/course/store', [CourseController::class, 'store'])->name('course.store');

    Route::get('admin/course/list', [CourseController::class, 'list'])->name('course.list');

    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('admin/category/list', [CategoryController::class, 'list'])->name('category.list');




});
Route::get('login',function (){
    return 'login-form';
})->name('login');



