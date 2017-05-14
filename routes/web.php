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


Route::any('/', [
    'as' => 'frontend.posts.index', 'uses' => 'BlogController@index'
]);

Route::get('/blog/{slug}', [
    'as' =>'frontend.posts.show', 'uses'=>'BlogController@show']);

Route::group(['prefix'=>'admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function(){
    Route::resource('/', 'DashboardController');
    Route::resource('/news', 'NewsController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/categories', 'CategoriesController');
});
Auth::routes();

Route::get('/home', 'HomeController@index');


