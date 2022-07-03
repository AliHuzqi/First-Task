<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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


Route::controller(OrderController::class)->group(function () {
    Route::get('order', 'index')->name('order');
    Route::post('order', 'store')->name('order.store');
    Route::get('order/update/{id}', 'update')->name('order.update');

});

//Route::get('/',function (){
//    return view('order');
//});
//
//Route::post('main/store', [OrderController::class])->name('main.store');


