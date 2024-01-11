<?php

use App\Models\Categories;
use Illuminate\Support\Facades\DB;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/admin/categoriesAdmin', [App\Http\Controllers\AdminController::class, 'showCategories'])->name('categoriesAdmin')->middleware('admin');
Route::get('/admin/productsAdmin', [App\Http\Controllers\AdminController::class, 'showProducts'])->name('productsAdmin')->middleware('admin');



Route::resource('/products', App\Http\Controllers\ProductController::class);
Route::resource('/categories', App\Http\Controllers\CategorieController::class);
Route::resource('/discounts', App\Http\Controllers\DiscountController::class);
Route::resource('/users', App\Http\Controllers\UserController::class);
