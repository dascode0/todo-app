<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'show']);
Route::post('/add-task',[TodoController::class, 'addTask']);
Route::get('mark-done/{id}', [TodoController::class, 'markDone']);
Route::get('delete/{id}', [TodoController::class, 'deleteTask']);