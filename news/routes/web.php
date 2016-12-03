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

// show a static view for the home page (app/views/home.blade.php)
Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
	]);

Route::resource('tasks', 'TasksController');
Route::resource('guest', 'GuestViewController');
Route::resource('comments', 'CommentsController');

Route::post('/postcomment','CommentsController@storeComment');
Route::get('/getcommentpage/{id}', 'CommentsController@showPage');

Auth::routes();

Route::get('/home', 'HomeController@index');
