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
Route::get('/blogs', 'BlogController@index')->name('blogs.index');
Route::get('/add', 'BlogController@create')->name('blogs.create');
Route::POST('/add', 'BlogController@store')->name('blogs.store');
Route::GET('/edit/{id}', 'BlogController@edit')->name('blogs.edit');
Route::POST('/edit/{id}', 'BlogController@update')->name('blogs.update');
Route::POST('/delete/{id}', 'BlogController@destroy')->name('blogs.delete');