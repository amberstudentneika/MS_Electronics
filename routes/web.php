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
//Route::get('/index', function(){
//    return view('admin.index')->name('index');
//});
Route::get('/admin', function(){
    return view('admin.login');
});
Route::get('/', function(){
    return view('user.index');
});
Route::get('/index', 'App\Http\Controllers\LoginController@index')->name('index');
Route::post('/admin')->name('login')->middleware('loginvalidation');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
//Product
Route::get('/create','App\Http\Controllers\ProductController@createview');
Route::post('/create','App\Http\Controllers\ProductController@create')->name('create')->middleware('cpvalidation');
Route::get('/view','App\Http\Controllers\ProductController@view')->name('view');
//Route::get('/edit','App\Http\Controllers\ProductController@editview');
Route::get('/edit/{id?}','App\Http\Controllers\ProductController@edit')->name('edit');
Route::post('/update','App\Http\Controllers\ProductController@update')->name('update');
