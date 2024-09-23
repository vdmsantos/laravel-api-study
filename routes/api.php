<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('users', [UserController::class, 'getAll']);
Route::get('user/{id}', [UserController::class, 'getById']);
Route::post('user', [UserController::class, 'create']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'delete']);
