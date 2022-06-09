<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

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

Route::controller(BrandController::class)->group(function () {

    Route::get('/', 'index')->name('brand.list');

    Route::get('/brand/new', 'new')->name('brand.new');
    Route::post('/brand/create', 'create')->name('brand.create');

    Route::get('/brand/edit/{brand_id}', 'edit')->name('brand.edit');
    Route::post('/brand/save', 'save')->name('brand.save');

    Route::get('/brand/remove/{brand_id}', 'drop')->name('brand.remove');
});

Route::controller(ProductController::class)->group(function () {

    Route::get('/product/list/{brand_id}', 'list')->name('product.list');

    Route::get('/product/new/{brand_id}', 'new')->name('product.new');
    Route::post('/product/create', 'create')->name('product.create');

    Route::get('/product/edit/{product_id}', 'edit')->name('product.edit');
    Route::post('/product/save', 'save')->name('product.save');

    Route::get('/product/remove/{product_id}', 'drop')->name('product.remove');
});
