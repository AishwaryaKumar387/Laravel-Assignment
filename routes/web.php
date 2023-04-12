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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers','middleware' => ['auth','prevent-back-history']], function () {
    Route::resource('products', ProductController::class);
    Route::post('change-product-status','ProductController@changeStatus')->name('products.change_status');
    Route::get('restore-product/{id}','ProductController@restore')->name('products.restore');
});