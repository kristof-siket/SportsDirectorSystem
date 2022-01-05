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
Route::get('/runalyzer', 'RunalyzerController@index')->name('runalyzer.index');

/*
 * Routes defined for models (automatic crud methods, url generation, etc.)
 */
Route::resource('competitions', 'CompetitionsController', ['parameters' => ['id' => 'comp_id']]);
Route::resource('users', 'UsersController');
Route::get('training_plans/export', 'TrainingPlansController@export')->name('training_plans.export');
Route::get('training_plans', 'TrainingPlansController@index')->name('training_plans.index');

/*
 * "Resource-like" routes to define some special actions
 */
Route::get('/competitions/{comp_id}/distances', 'CompetitionsController@addDistances')->name('competitions.addDistances');
Route::post('/competitions/{comp_id}/savedistances', 'CompetitionsController@storeDistances')->name('competitions.storeDistances');
Route::put('/results/{res_id}/update', 'ResultsController@update')->name('results.update');
Route::get('/results/{comp_id}', 'ResultsController@index')->name('results.index');
Route::get('/competitions/{comp_id}/enter/{dist_id}', 'ResultsController@enter')->name('results.enter');
Route::get('/runalyzer/setup', 'RunalyzerController@setup')->name('runalyzer.setup');
Route::get('/runalyzer/create', 'RunalyzerController@create')->name('runalyzer.create');
Route::get('/runalyzer/show', 'RunalyzerController@show')->name('runalyzer.show');

/*
 * Routes defined by auto-generated authentication (and maybe some extensions of that)
 */
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

