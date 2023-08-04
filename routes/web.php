<?php

use App\Http\Controllers\ListsController;
use App\Http\Controllers\StickyController;
use App\Http\Controllers\SubtaskController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index'])->name('all-tasks');
Route::get('/get-all-list', [ListsController::class, 'index']);
Route::get('/get-task/{task_id}', [TaskController::class, 'show']);
Route::post('/store-task', [TaskController::class, 'store']);
Route::post('/task-update', [TaskController::class, 'update']);
Route::get('/delete-task/{task_id}', [TaskController::class, 'destroy']);
Route::post('/store-subtask', [SubtaskController::class, 'store']);
Route::post('/store-list', [ListsController::class, 'store']);
Route::post('/change-subtask-status', [SubtaskController::class, 'update']);
Route::post('/change-task-status', [TaskController::class, 'markTaskAsDone']);
Route::get('/search/{search}', [TaskController::class, 'search']);


Route::get('/today', [TaskController::class, 'toDay'])->name('today');

Route::get('/calendar', function(){
    return 'calendar';
})->name('calendar');

Route::get('/sticky-wall', [StickyController::class, 'index'])->name('sticky');

Route::get('/list/{list_id}', [ListsController::class, 'show'])->name('list');

Route::get('/settings', function(){
    return 'Settings';
})->name('settings');

Route::get('/logout', function(){
    return 'logout';
})->name('logout');
