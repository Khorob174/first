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
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
  Route::get('/', 'reservationController@reservation')->name('admin.index');
  Route::post('/show', 'reservationController@show')->name('admin.show');
  Route::get('/show', 'reservationController@show')->name('admin.show');
  Route::post('/user', 'reservationController@user')->name('admin.user');
  Route::get('/user', 'reservationController@user')->name('admin.user');
  Route::resource('/reservation','reservationBDController', ['as'=>'admin']);
});
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['web']], function(){
  Route::resource('/reservation','reservationBDController', ['as'=>'admin','only' => ['create', 'store']]);
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
