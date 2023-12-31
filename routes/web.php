<?php

use App\Http\Controllers\addChatbot;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\manageAdminController;
use App\Http\Controllers\manageChatbot;
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
Route::get('/terms', [LoginController::class, "terms"]);
Route::get('/privacyPolicy', [LoginController::class, "privacy"]);
Route::get('/signup', [SignupController::class, "index"]);
Route::post('/signup', [SignupController::class, "store"]);
Route::get('/logout', [DashboardController::class, "logout"]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"]);
    Route::get('/chatbot', [ChatbotController::class, "index"]);
});

Route::get('/admin', [AdminController::class, "index"]);
Route::post('/admin', [AdminController::class, "store"]);

Route::group(['middleware' => 'admin'], function () {
    Route::get('/manageChatbot', [manageChatbot::class, "index"]);
    Route::get('/manageChatbot/delete/{id}', [manageChatbot::class, 'destroy']);
    Route::get('/addChatbot', [addChatbot::class, "index"]);
    Route::post('/addChatbot', [addChatbot::class, "store"]);
    Route::get('/editChatbot/{id}', [addChatbot::class, "edit"]);
    Route::put('/addChatbot/{id}', [addChatbot::class, "update"]);
    Route::get('/addAdmin', [manageAdminController::class, 'create']);
    Route::post('/addAdmin', [manageAdminController::class, "store"]);
    Route::get('/manageAdmin', [manageAdminController::class, 'index']);
    Route::get('/manageAdmin/delete/{id}', [manageAdminController::class, 'destroy']);
    Route::get('/editAdmin/{id}', [manageAdminController::class, "edit"]);
    Route::put('/manageAdmin/{id}', [manageAdminController::class, "update"]);
});

Route::get('/groups/{id}', [GroupController::class, 'getById']);
Route::get('/groups/name/{name}', [GroupController::class, 'getByName']);
Route::get('/groups', [GroupController::class, 'getAll']);
