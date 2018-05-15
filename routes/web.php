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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//********** ARTICLES ROUTES ******************/
//sirve para los 6 defecto
Route::resource('article', 'ArticleController');

//********** ARTICLES ROUTES ******************/

//********** CATEGORIES ROUTES ******************/
Route::resource('category', 'CategoryController');

//********** CATEGORIES ROUTES ******************/



