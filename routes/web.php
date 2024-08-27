<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware((['auth', 'admin']));
Route::get('view_category', [AdminController::class, 'viewCategory'])->middleware((['auth', 'admin']));
Route::post('add_category', [AdminController::class, 'addCategory'])->middleware((['auth', 'admin']));
Route::get('delete_category/{id}', [AdminController::class, 'deleteCategory'])->middleware((['auth', 'admin']));
Route::get('edit_category/{id}', [AdminController::class, 'editCategory'])->middleware((['auth', 'admin']));
Route::post('update_category/{id}', [AdminController::class, 'updateCategory'])->middleware((['auth', 'admin']));
Route::get('add_product', [AdminController::class, 'addProduct'])->middleware((['auth', 'admin']));
Route::post('upload_product', [AdminController::class, 'uploadProduct'])->middleware((['auth', 'admin']));
Route::get('view_product', [AdminController::class, 'viewProduct'])->middleware((['auth', 'admin']));
Route::get('delete_product/{id}', [AdminController::class, 'deleteProduct'])->middleware((['auth', 'admin']));
Route::get('edit_product/{id}', [AdminController::class, 'editProduct'])->middleware((['auth', 'admin']));
Route::post('update_product/{id}', [AdminController::class, 'updateProduct'])->middleware((['auth', 'admin']));
Route::get('product_search', [AdminController::class, 'productSearch'])->middleware((['auth', 'admin']));

Route::get('product_details/{id}', [HomeController::class, 'productDetails']);
Route::get('add_cart/{id}', [HomeController::class, 'addCart'])->middleware((['auth', 'verified']));
Route::get('mycart', [HomeController::class, 'mycart'])->middleware((['auth', 'verified']));