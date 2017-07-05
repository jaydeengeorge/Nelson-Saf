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

// Users account
Route::get('/user/account', 'UserController@getUserAccount');

// Submit a complain
Route::post('/complain', 'UserController@launchComplain');

// Submitting Login Form-data
Route::post('/login', 'UserController@authenticate');

//Testing
Route::get('/test', 'UserController@test');
