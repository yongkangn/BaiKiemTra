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

Route::get('/', function () {
    return view('welcome');
});
Route::get('list','TinTucController@index')->name('list');
Route::get('add','TinTucController@create')->name('them');
Route::get('add','DanhMucController@index');
Route::get('edit','DanhMucController@index');
Route::post('add','TinTucController@store');
Route::get('edit/{id}','TinTucController@edit')->name('edit');
Route::post('edit/{id}','TinTucController@update')->name('update');
Route::get('delete/{id}','TinTucController@destroy')->name('destroy');