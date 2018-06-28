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

Route::get('/',['uses' => 'PagesController@getIndex','as' => 'home']);

//Pages Route
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::post('contact','PagesController@postContact');

//Blog Routes Here
Route::get('blog',['uses'=> 'BlogController@getIndex','as'=>'blog.index']);
Route::get('blog/{slug}',['uses'=> 'BlogController@getSingle','as' => 'blog.single'])->where('slug', '[\w\d\-\_]+');

//User Profile
Route::get('profile', ['uses' => 'UserController@profile', 'as' => 'user.profile']);

//Post Route
Route::resource('posts', 'PostController');

//Catergories Route
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Tags Route
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Comments Route
Route::post('comments/{post_id}',['uses' => 'CommentsController@store','as' => 'comments.store']);
Route::get('comments/{id}/edit',['uses'  => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as'=> 'comments.delete']);

//Auth Login, Register Route
Route::get('auth/register',['uses' => 'Auth\RegisterController@getRegister','as' => 'registra']);
Route::post('auth/register',['uses' => 'Auth\RegisterController@register']);
Route::get('auth/login',['uses' => 'Auth\LoginController@getLogin','as' => 'showLogin']);
Route::post('auth/login',['uses' => 'Auth\LoginController@login','as'=> 'loggin']);
Route::get('auth/logout',['uses' => 'Auth\LoginController@getLogout','as' => 'logout']);
