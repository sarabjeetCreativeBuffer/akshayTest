<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

