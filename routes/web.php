<?php
//Himar Martín Vega

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/product/store', function () {
    return redirect()->route('product.create');
});

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/create', function () {
    return view('product');
})->name('product.create');
