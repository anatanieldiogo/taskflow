<?php

use App\Http\Controllers\ListsController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get-all-todo', [TaskController::class, 'index']);
Route::get('/get-all-list', [ListsController::class, 'index']);
