<?php

use App\Http\Controllers\adminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\productAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[homeController::class,'index'])->name('home');
Route::get('/product/{product:slug}',[productController::class,'show'])->name('product');

// Admin
Route::get('/admin/products',[adminProductController::class,'index'])->name('admin.products');
Route::get('/admin/products/create',[adminProductController::class,'create'])->name('admin.products.create');
Route::post('/admin/products',[adminProductController::class,'store'])->name('admin.products.store');

Route::get('/admin/products/{product}/edit',[adminProductController::class,'edite'])->name('admin.product.edit');
Route::put('/admin/products/{product}',[adminProductController::class,'update'])->name('admin.product.update');

Route::delete('/admin/products/{product}',[adminProductController::class,'destroy'])->name('admin.product.destroy');
Route::get('/admin/products/{product}/delete-imagen',[adminProductController::class,'destroyImagen'])->name('admin.product.destroyImagen');