<?php


Route::get('/', 'HomeController@index');
Route::get('search', 'HomeController@search');

Route::resource('post', 'PostController');
Route::resource('type', 'PostTypeController', ['except' => ['index']]);
Route::resource('post.comment', 'PostCommentController', ['only' => ['store', 'destroy']]);

Route::auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
    Route::get('avatar','UserController@getAvatar');
    Route::post('avatar','UserController@postAvatar');
});