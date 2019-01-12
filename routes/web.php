<?php


Route::get('/', 'HomeController@index');
Route::get('search', 'HomeController@search');

Route::get('login','Auth\AuthController@showLoginForm');
Route::post('login','Auth\AuthController@login');
Route::get('logout','Auth\AuthController@logout');

Route::resource('post', 'PostController');
Route::resource('type', 'PostTypeController', ['except' => ['index']]);
