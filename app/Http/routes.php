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

    /* Soft Deletion routes */
    Route::get('posts/trash', [
        'as' => 'posts.trash.index',
        'uses' => 'PostsController@showTrash'
    ]);

    //not working for a mysterious reason
    /*Route::delete('posts/trash', [
        'as' => 'posts.trash.empty',
        'uses' => 'PostsController@emptyTrash'
    ]);*/

    Route::put('posts/trash/{id}', [
        'as' => 'posts.trash.restore',
        'uses' => 'PostsController@restoreTrashed'
    ]);

    Route::delete('posts/trash/{id}', [
        'as' => 'posts.trash.remove',
        'uses' => 'PostsController@removeTrashed'
    ]);
});

