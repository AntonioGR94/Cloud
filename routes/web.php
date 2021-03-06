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

Route::get('/', 'FilesController@index')->name('root');
Route::get('/contact', 'FilesController@contact')->name('contact')->middleware('auth');
Route::get('/about', 'FilesController@about')->name('about');
Route::resource('/files', 'FilesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/{user}/files', 'UserFilesController@index')->name('userfiles.index');