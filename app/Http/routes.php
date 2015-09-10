<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home', 'uses' => 'IndexController@index'
]);

Route::get('/comics', [
    'as' => 'comics', 'uses' => 'ComicsController@index'
]);

Route::get('/comics/{id}', [
    'as' => 'comics_page', 'uses' => 'ComicsController@page'
])->where('id', '[0-9]+');

Route::post('/comics/comment', [
    'as' => 'post_comment', 'uses' => 'ComicsController@comment'
]);

Route::post('/comics/like', [
    'as' => 'comics_like', 'uses' => 'ComicsController@like'
]);

Route::get('/registration', [
    'as' => 'registration', 'uses' => 'RegistrationController@index'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
    'admin' => 'AdminController',
    'task' => 'TaskController',
    'people' => 'PeopleController'
]);

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('/admin', [
        'as' => 'adminPanel', 'uses' => 'AdminController@index'
    ]);
});
