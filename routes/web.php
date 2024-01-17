<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::middleware(['guest:admin'])->group(function () {
    Route::get('login', [AuthController::class, 'viewLogin'])->name('view.login');
    Route::post('login', [AuthController::class, 'handleLogin'])->name('handle.login');
    Route::get('register', [AuthController::class, 'viewRegister'])->name('view.register');
    Route::post('register', [AuthController::class, 'handleRegister'])->name('handle.register');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', function() {
        echo "Admin Logged in <br>";
        echo "<a href='/logout'>Logout</a>";
    })->name('view.dashboard');
    Route::get('logout', function() {
        Auth::logout();
        return redirect()->route('view.login');
    })->name('handle.logout');
});

Route::get('product/list', [ProductController::class, 'viewProductList'])->name('view.product.list');

Route::get('category/list', [CategoryController::class, 'viewCategory'])->name('view.category.list');
Route::get('category/add', [CategoryController::class, 'viewAdd'])->name('view.add.list');
Route::get('category/edit/{id}', [CategoryController::class, 'viewedit'])->name('view.edit.list');

Route::post('category/add', [CategoryController::class, 'store'])->name('store.category');
Route::post('category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');