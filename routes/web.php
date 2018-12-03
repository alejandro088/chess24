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

Route::get('/', 'PageController@index')->name("Welcome");

Route::get('/player/{player}', 'PlayerController@show')->name("player");

Auth::routes(['register' => false]);
//Auth::routes();

Route::get('/SetupMatches', 'MatchController@SetupMatches')->middleware('auth')->name('SetupMatches');
Route::get('/setResult/{match}/{score}', 'HomeController@setResult')->name('setResult');
Route::get('/home', 'HomeController@index')->name('home');

