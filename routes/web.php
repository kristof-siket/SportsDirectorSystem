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

Route::get('/', 'PagesController@index')->name('welcome');

Route::resource('competitions', 'CompetitionsController', ['parameters' => ['id' => 'comp_id']]);
Route::resource('training_plans', 'TrainingPlansController');
Route::resource('runalyzer', 'RunalyzerController');

Route::get('/competitions/{comp_id}/distances', 'CompetitionsController@addDistances')->name('competitions.addDistances');
Route::post('/competitions/{comp_id}/savedistances', 'CompetitionsController@storeDistances')->name('competitions.storeDistances');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
