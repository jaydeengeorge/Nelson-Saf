<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
*/

use classes\Route;

// User Authentication and Register routes
Route::auth();

// Home page view
Route::get('/', 'HomeController@index');

/*
* User Routes
|--------------------------------------------------------------------------
*/

// Submit a complain
Route::post('/complain', 'UserController@launchComplain');

// Submitting Login Form-data
Route::post('/login', 'UserController@authenticate');

// Logout the user
Route::post('/logout', 'UserController@logout');

// Users account
Route::get('/user/dashboard', 'UserController@getUserDashboard');

// View previous Complains
Route::get('/user/previous-complains', 'UserController@previousComplains');

// Delete Complain
Route::post('/complain/delete', 'UserController@deleteComplain');

/*
* Admin Routes
|--------------------------------------------------------------------------
*/

// Admin (Super User)
Route::get('/admin', 'AdminController');

// Admin (Super User)
Route::get('/admin/login', 'AdminController@getLogin');

// Authenticate admin
Route::post('/admin/login', 'AdminController@authenticate');

// All Complains view
Route::get('/admin/list-complains', 'AdminController@getAllComplains');

Route::get('/user/profile', 'AdminController@getUserProfile');


/*
* Agents Routes
|--------------------------------------------------------------------------
*/





//Testing
Route::get('/test', 'UserController@test');
