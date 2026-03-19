<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/admin', AdminController::class)->name('admin');

Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/show', 'show')->name('product.show');

    // RUTAS DINAMICAS - siempre se escriben al final
    Route::get('/{producto}', 'show');

    // #borrar
    Route::delete('/{producto}', 'destroy')->name('product.destroy');

    // #url es para recibir datos desde post
    Route::post('/store', 'store')->name('product.store');
});
