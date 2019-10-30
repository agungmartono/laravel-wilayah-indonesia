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
Route::get('/', 'HomeController@index')->name('home');
Route::get('home/getKabupaten', 'HomeController@getKabupaten')->name('getKabupaten');
Route::get('home/getKecamatan', 'HomeController@getKecamatan')->name('getKecamatan');
Route::get('home/getDesa', 'HomeController@getDesa')->name('getDesa');
