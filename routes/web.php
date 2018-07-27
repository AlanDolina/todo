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


Route::get('/','TodoController@show')->name('home');

Route::get('/home','TodoController@show');

Route::get('/register','RegistrationController@create');

Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create')->name('login');

Route::post('/login','SessionsController@store');

Route::get('/logout','SessionsController@destroy');

Route::post('/todo/create','TodoController@store');

Route::get('/todo/{todo}/edit','TodoController@edit');

Route::post('/todo/{todo}/edit/update','TodoController@update');

Route::get('/todo/{todo}/delete','TodoController@destroy');

Route::get('/todo/{todo}/done','TodoController@done');

Route::get('/todo/his','TodoController@showhis');

Route::get('/todo/{todo}/undone','TodoController@undone');