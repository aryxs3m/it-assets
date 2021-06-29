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

Auth::routes();

Route::middleware('auth')->group(function(){

    Route::get("/logout", function(){
        Auth::logout();
        return redirect()->to('/login');
    });

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('/devices')->group(function(){
        Route::get('/', [\App\Http\Controllers\DevicesController::class, 'index']);
        Route::view('/new', 'devices.edit');
        Route::post('/save', [\App\Http\Controllers\DevicesController::class, 'save']);
        Route::get('/details/{device}', [\App\Http\Controllers\DevicesController::class, 'details']);
        Route::get('/edit/{model}', [\App\Http\Controllers\DevicesController::class, 'edit']);
        Route::get('/delete/{model}', [\App\Http\Controllers\DevicesController::class, 'deleteConfirm']);
        Route::post('/delete/{model}', [\App\Http\Controllers\DevicesController::class, 'delete']);
    });

    Route::prefix('/types')->group(function(){
        Route::get('/', [\App\Http\Controllers\DeviceTypeController::class, 'index']);
        Route::view('/new', 'types.edit');
        Route::post('/save', [\App\Http\Controllers\DeviceTypeController::class, 'save']);
        Route::get('/edit/{model}', [\App\Http\Controllers\DeviceTypeController::class, 'edit']);
        Route::get('/delete/{model}', [\App\Http\Controllers\DeviceTypeController::class, 'deleteConfirm']);
        Route::post('/delete/{model}', [\App\Http\Controllers\DeviceTypeController::class, 'delete']);
    });

    Route::prefix('/positions')->group(function(){
        Route::get('/', [\App\Http\Controllers\PositionsController::class, 'index']);
        Route::view('/new', 'positions.edit');
        Route::post('/save', [\App\Http\Controllers\PositionsController::class, 'save']);
        Route::get('/edit/{model}', [\App\Http\Controllers\PositionsController::class, 'edit']);
        Route::get('/delete/{model}', [\App\Http\Controllers\PositionsController::class, 'deleteConfirm']);
        Route::post('/delete/{model}', [\App\Http\Controllers\PositionsController::class, 'delete']);
    });

    Route::prefix('/products')->group(function(){
        Route::get('/select2', [\App\Http\Controllers\ProductController::class, 'select2']);
        Route::get('/', [\App\Http\Controllers\PositionsController::class, 'index']);
        Route::view('/new', 'positions.edit');
        Route::post('/save', [\App\Http\Controllers\PositionsController::class, 'save']);
        Route::get('/edit/{model}', [\App\Http\Controllers\PositionsController::class, 'edit']);
        Route::get('/delete/{model}', [\App\Http\Controllers\PositionsController::class, 'deleteConfirm']);
        Route::post('/delete/{model}', [\App\Http\Controllers\PositionsController::class, 'delete']);
    });
});
