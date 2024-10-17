<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
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
Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
// Route::resource('products', ProductController::class);
Route::get('/', [ProductController::class, 'index']);
Route::prefix('/products')->name('products.')->group(function() {
    Route::get('/',[ProductController::class, 'index'])->name('index');
    Route::get('/crete',[ProductController::class, 'create'])->name('create');
    Route::post('/store',[ProductController::class, 'store'])->name('store');
    Route::delete('/hapus/{id}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit'); // Mengarahkan ke form edit pengguna berdasarkan ID
    Route::patch('/edit/{id}', [ProductController::class, 'update'])->name('update');
    Route::resource('products', ProductController::class);
});
