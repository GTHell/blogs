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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/posts/{id}', 'PostController@show')->name('post');

Route::post('/posts/{id}/comment', 'CommentController@store')->name("comment.store");
Route::delete('/posts/{id}/comment', 'CommentController@destroy')->name("comment.destroy");


//Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('dashboard')->group(function () {
    Route::get('/', 'UserController@index')->name('dashboard');
    Route::resource('/posts', 'Admin\PostController', ['as' => 'admin']);
    Route::resource('/images', 'Admin\GalleryController', ['as' => 'admin']);
    // Admin
    Route::resource('/categories', 'Admin\CategoryController', ['as' => 'admin']);
});

Route::get('/test', 'UserController@test');
