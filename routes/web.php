<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\CarController;
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

Route::group(['as'=>'admin.','middleware' => ['auth','admin']],function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::group(['prefix'=>'admin'],function(){
        Route::resource('/brands',BrandController::class);
        Route::resource('/models',CarModelController::class);
        Route::resource('/cars',CarController::class);
        Route::post('/get-models',[AdminController::class,'GetModels'])->name('get.models');
    });

});
Auth::routes();

