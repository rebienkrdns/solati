<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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

Route::get('/', function () {
    return 'Solati test: v' . Application::VERSION . ' PHP v' . PHP_VERSION;
});

Route::get('/login', function () {
    return response()->json(['message' => 'Unauthorized.'], 401);
})->name('login');
