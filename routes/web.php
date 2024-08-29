<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard'); // pastikan view 'dashboard' sudah ada
});

Route::resource('product', ProductController::class);
// Route::get('/products/index', [ProductController::class, 'index'])->name('product.index');
