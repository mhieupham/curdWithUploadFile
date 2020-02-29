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

Route::get('home','CurdController@index')->name('home');
Route::get('home/create','CurdController@create')->name('curd.create');
Route::post('home/create','CurdController@store')->name('curd.store');
Route::get('show/{id}','CurdController@show')->name('curd.show');
Route::get('home/{id}/edit','CurdController@edit')->name('curd.edit');
Route::put('home/{id}','CurdController@update')->name('curd.update');
Route::delete('home/{id}','CurdController@delete')->name('curd.delete');
