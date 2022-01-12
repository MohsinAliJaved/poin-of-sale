<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'createCustomer']);
Route::post('/customer/save', [App\Http\Controllers\CustomerController::class, 'saveCustomer'])->name('save-customer');
Route::get('delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'deleteCustomer']);
Route::get('edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'editCustomer']);
Route::post('update-customer', [App\Http\Controllers\CustomerController::class, 'updateCustomer'])->name('update-customer');


Route::get('/product', [App\Http\Controllers\ProductController::class, 'createProduct']);
Route::post('/product/save', [App\Http\Controllers\ProductController::class, 'saveProduct'])->name('save-product');
Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);
Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'editProduct']);
Route::post('/update-product', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('update-product');