<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('/admin', AdminController::class)->name('admin');

// CRUD CATEGORIAS
Route::prefix('admin/categorias')->controller(CategoryController::class)->group(function(){
    Route::get('/', 'index')->name('categoria.index');
    Route::get('/create', 'create')->name('categoria.create');
    Route::post('/store', 'store')->name('categoria.store');
    Route::get('/edit/{categoria}', 'edit')->name('categoria.edit');
    Route::put('/update/{categoria}', 'update')->name('categoria.update');
    Route::delete('/destroy/{categoria}', 'destroy')->name('categoria.destroy');
});

Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/show', 'show')->name('product.show');
    Route::get('/{producto}', 'show');
    Route::delete('/{producto}', 'destroy')->name('product.destroy');
});
