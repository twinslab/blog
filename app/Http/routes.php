<?php

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('posts', 'PostsController', [
	'only' => ['index', 'show']
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
	Route::get('/', [
		'as' => 'admin.index',
		'uses' => 'AdminController@index'
	]);

	Route::resource('posts', 'PostsController', [
		'except' => ['show']
	]);

    Route::get('posts/trash', [
        'as' => 'admin.posts.trash',
        'uses' => 'PostsController@trash'
    ]);

});