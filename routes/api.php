<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [UsersController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [UsersController::class, 'me']);
    Route::post('/me', [UsersController::class, 'update']);

    Route::get('/users', [UsersController::class, 'list']);
    Route::post('/users/create', [UsersController::class, 'create']);
});
