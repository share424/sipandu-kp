<?php

use Illuminate\Support\Facades\Auth;
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


// Auth
Route::get('/login', 'AuthController@index')->name('auth.index');
Route::post('/login', 'AuthController@login')->name('auth.login');
Route::get('/signup', 'AuthController@signup')->name('auth.signup');
Route::post('/signup', 'AuthController@createUser')->name('auth.signup');
Route::get('/reset-password', 'AuthController@resetPassword')->name('auth.reset-password');

// Only for Authenticated User
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    Route::get('/jenis-pelayanan', 'PelayananController@index')->name('pelayanan.index');

    // User
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users/create', 'UserController@store')->name('users.store');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::post('/users/{id}/edit', 'UserController@update')->name('users.update');
    Route::delete('/users/{id}/delete', 'UserController@destroy')->name('users.destroy');
});
