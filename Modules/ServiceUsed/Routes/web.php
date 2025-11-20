<?php

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

use Illuminate\Support\Facades\Route;

Route::prefix('serviceused')->group(function () {
    Route::get('/index', 'ServiceUsedController@index')->name('serviceused.index');
    Route::get('/create', 'ServiceUsedController@create')->name('serviceused.create');
    Route::post('/', 'ServiceUsedController@store')->name('serviceused.store');
    Route::get('/{id}/edit', 'ServiceusedController@edit')->name('serviceused.edit');
    Route::put('/{id}', 'ServiceusedController@update')->name('serviceused.update');
    Route::delete('/{id}', 'ServiceusedController@destroy')->name('serviceused.destroy');
});
