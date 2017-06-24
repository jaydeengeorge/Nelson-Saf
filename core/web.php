<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
*/

// User Authentication and Register routes
Route::auth();

// Home page view
Route::get('/', 'Home_Controller@index');

// Users account
Route::get('/user/account', 'User_Controller@getLogin');
