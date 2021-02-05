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
  Route::get('users/{id}/edit', 'UserController@trainerEdit')->name('users.edit')->middleware('is.owner');
  Route::put('users/{id}', 'UserController@trainerUpdate')->name('users.update')->middleware('is.owner');
  Route::get('users/{id}/courses', 'TrainerCourseController@show')->name('courses.show')->middleware('is.owner');
});
Route::group([
  'prefix' => 'training-staff',
  'as' => 'training-staff.',
  'middleware' => 'is.trainingstaff'
], function () {
  Route::get('/home', 'HomeController@trainingstaffHome')->name('home'); // home page
  Route::get('/trainees', 'TrainingStaffController@trainees')->name('trainees'); // list trainee
  Route::get('/users/create', 'TrainingStaffController@create')->name('users.create'); // show form create trainee
  Route::post('/users', 'TrainingStaffController@store')->name('users.store');
  Route::get('/trainees/{id}/edit', 'TrainingStaffController@traineeEdit')->name('trainees.edit')->middleware('staff.trainee');
  Route::put('/trainees/{id}', 'TrainingStaffController@traineeUpdate')->name('trainees.update');
  // trainee assign
  Route::get('/trainees/{id}/assign', 'TrainingStaffController@traineeAssignView')->name('trainees.assign.view')->middleware('staff.trainee');
  Route::post('/trainees/{id}', 'TrainingStaffController@traineeAssign')->name('trainees.assign.store');
  Route::delete('/trainees/{id}/delete-assign/{course_id}', 'TrainingStaffController@traineeAssignDelete')->name('trainees.assign.delete');
  // end trainee assign
  // courses

  Route::get('/courses/create', 'CourseController@create')->name('courses.create'); // create course
  Route::post('/courses', 'CourseController@store')->name('courses.store');
  // end courses
  Route::delete('/trainees/{id}', 'TrainingStaffController@traineeDestroy')->name('trainees.destroy'); // delete trainee
});
// Route::resource('users', 'UserController');
// Route::resource('roles', 'RoleController');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
