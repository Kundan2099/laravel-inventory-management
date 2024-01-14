<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('login', [AuthController::class, 'viewLogin'])->name('view.login');


Route::get('product/list', [ProductController::class, 'viewProductList'])->name('view.product.list');

Route::get('category/list', [CategoryController::class, 'viewCategory'])->name('view.category.list');
Route::get('category/add', [CategoryController::class, 'viewAdd'])->name('view.add.list');
Route::get('category/edit', [CategoryController::class, 'viewedit'])->name('view.edit.list');

Route::post('category/add', [CategoryController::class, 'store'])->name('view.store.list');

