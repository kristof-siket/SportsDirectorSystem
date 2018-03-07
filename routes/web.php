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

/*
 * Basic routes for changing pages
 */
Route::get('/', 'PagesController@index')->name('welcome');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

/*
 * Routes defined for models (automatic crud methods, url generation, etc.)
 */
Route::resource('competitions', 'CompetitionsController', ['parameters' => ['id' => 'comp_id']]);
Route::resource('training_plans', 'TrainingPlansController');
Route::resource('runalyzer', 'RunalyzerController');

/*
 * "Resource-like" routes to define some special actions
 */
Route::get('/competitions/{comp_id}/distances', 'CompetitionsController@addDistances')->name('competitions.addDistances');
Route::post('/competitions/{comp_id}/savedistances', 'CompetitionsController@storeDistances')->name('competitions.storeDistances');
Route::get('/results/{comp_id}', 'ResultsController@index')->name('results.index');
Route::get('/competitions/{comp_id}/enter/{dist_id}', 'ResultsController@enter')->name('results.enter');

/*
 * Routes defined by auto-generated authentication (and maybe some extensions of that)
 */
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

