<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, "index"]);
Route::post('/login', [LoginController::class, "store"])->name("login");
Route::get('/signup', [SignupController::class, "index"]);
Route::post('/signup', [SignupController::class, "store"]);
Route::get('/logout', [DashboardController::class, "logout"]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"]);
});
