<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');  // ← agrégale el name
    Route::get('/show', 'show')->name('product.show');

    // RUTAS DINAMICAS - siempre se escriben al final de las rutas estaticas
    Route::get('/{producto}', 'show');

    // url es para recibir datos desde post
    Route::post('/store', 'store')->name('product.store');
});
