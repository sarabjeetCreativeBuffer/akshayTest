<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/task-list', [TaskController::class, 'index'])->name('task.list');
Route::get('/task-create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task-store', [TaskController::class, 'store'])->name('task.store');
Route::post('/task-delete/{id}', [TaskController::class, 'delete'])->name('task.destroy');
Route::get('/task-show/{id}', [TaskController::class, 'show'])->name('task.show');
Route::get('/task-edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/task-update', [TaskController::class, 'update'])->name('task.update');


Route::get('/category-list', [CategoryController::class, 'index'])->name('category.list');
Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category-delete/{id}', [CategoryController::class, 'delete'])->name('category.destroy');
Route::get('/category-show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category-update', [CategoryController::class, 'update'])->name('category.update');


