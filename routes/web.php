<?php

use App\Http\Controllers\ListsController;
use App\Http\Controllers\SubtaskController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get-all-task', [TaskController::class, 'index']);
Route::get('/get-all-list', [ListsController::class, 'index']);
Route::get('/get-task/{task_id}', [TaskController::class, 'show']);
Route::post('/store-task', [TaskController::class, 'store']);
Route::post('/store-subtask', [SubtaskController::class, 'store']);
