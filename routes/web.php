<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
  'prefix' => 'admin',
  'as' => 'admin.',
  'middleware' => ['is.admin'],
], function () {

  Route::get('/users', 'UserController@index')->name('users.index');
  Route::get('/users/create', 'UserController@create')->name('users.create');
  Route::post('/users', 'UserController@store')->name('users.store');
  Route::get('/users/{id}', 'UserController@show')->name('users.show');
  Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
  Route::put('/users/{id}', 'UserController@update')->name('users.update');
  Route::delete('/users/{id}', 'UserController@destroy')->name('users.destroy');
  Route::get('/roles', 'RoleController@index')->name('roles.index');
  Route::get('roles/{id}/users', 'RoleController@getUsers')->name('roles.list_users');
});
Route::group([
  'prefix' => 'trainee',
  'as' => 'trainee.',
  'middleware' => ['is.trainee'],
], function () {
  Route::get('/home', 'HomeController@traineeHome')->name('home');
  Route::get('users/{id}/edit', 'UserController@traineeEdit')->name('users.edit')->middleware('is.owner');
  Route::put('users/{id}', 'UserController@traineeUpdate')->name('users.update')->middleware('is.owner');
  Route::get('users/{id}/courses', 'TraineeCourseController@show')->name('courses.show')->middleware('is.owner');
});
Route::group([
  'prefix' => 'trainer',
  'as' => 'trainer.',
  'middleware' => 'is.trainer'
], function () {
  Route::get('/home', 'HomeController@trainerHome')->name('home');
  Route::get('users/{id}/courses', 'TrainerCourseController@show')->name('courses.show')->middleware('is.owner');
});
// Route::resource('users', 'UserController');
// Route::resource('roles', 'RoleController');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
