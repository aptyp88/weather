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
Route::get('/weather', 'WeatherController@index')->name('weather');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('contact-us', 'ContactUsController@index')->name('contact-us');
Route::post('/contact-us/store', 'ContactUsController@store');

Route::get('/comments', 'CommentsController@index')->name('comments');
Route::post('/comments/show', 'CommentsController@show');
Route::post('/show-more-comments', 'CommentsController@showMore');