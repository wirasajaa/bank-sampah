<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepositeController;
use App\Http\Controllers\TrashTypeController;
use App\Models\Category;
use App\Models\TrashType;
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
Route::get('/deposit/detail', [DepositeController::class, 'detail'])->name('depo.detail');
Route::get('/deposit/{trash}', [ClientController::class, 'depo'])->name('depo');
Route::post('/deposit/{trash}', [DepositeController::class, 'store'])->name('depo.store');
Route::get('/trash', [ClientController::class, 'list_trash'])->name('list.trash');

// auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/trash/type', [TrashTypeController::class, 'index'])->name('admin.type');
    Route::get('/trash/type/new', [TrashTypeController::class, 'create'])->name('admin.type.new');
    Route::post('/trash/type/add', [TrashTypeController::class, 'store'])->name('admin.type.store');
    Route::get('/trash/type/edit/{type}', [TrashTypeController::class, 'edit'])->name('admin.type.edit');
    Route::put('/trash/type/update/{type}', [TrashTypeController::class, 'update'])->name('admin.type.update');
    Route::delete('/trash/type/delete/{type}', [TrashTypeController::class, 'destroy'])->name('admin.type.delete');

    Route::get('/trash/category', [AdminController::class, 'category'])->name('admin.category');
    Route::get('/trash/category/new', [CategoryController::class, 'create'])->name('admin.category.new');
    Route::post('/trash/category/add', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/trash/category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/trash/category/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/trash/category/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
});
