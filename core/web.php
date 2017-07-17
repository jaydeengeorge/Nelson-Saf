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

// Admin (Super User)
Route::get('/admin', 'AdminController');


//Testing
Route::get('/test', 'UserController@test');
