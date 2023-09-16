<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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

Route::get('/', [ClientController::class, 'index'])->name('dashboard');
Route::get('/deposit', [ClientController::class, 'depo'])->name('depo');

// auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::post('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
