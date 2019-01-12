<?php


Route::get('/', 'HomeController@index');
Route::get('search', 'HomeController@search');

Route::resource('post', 'PostController');
Route::resource('type', 'PostTypeController', ['except' => ['index']]);

Route::auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

