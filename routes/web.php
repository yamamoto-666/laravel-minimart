<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductController;


Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'section', 'as' => 'section.'], function(){

        Route::get('/', [SectionController::class, 'index'])->name('index');
        Route::post('/store', [SectionController::class, 'store'])->name('store');
        Route::delete('/{id}/destroy', [SectionController::class, 'destroy'])->name('destroy');
    });
        #product
        Route::get('/',[ProductController::class, 'index'])->name('product.index');
        #create     
        Route::get('/product/create',[ProductController::class, 'create'])->name('products.create');
        #destroy
        Route::delete('/product/{id}/destroy',[ProductController::class, 'destroy'])->name('product.destroy');
        #addsection
        Route::post('/product/store',[ProductController::class, 'store'])->name('store');
        #edit
        Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->name('product.edit');
        #update
        Route::patch('/product/{id}/update',[ProductController::class, 'update'])->name('product.update');
});