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

//Authentication
Route::get('/admin/register', 'Auth\AdminRegisterController@create')->name('register')->middleware('guest');
Route::post('/admin/register', 'Auth\AdminRegisterController@store');
Route::get('/admin/login', 'Auth\AdminLoginController@create')->name('login')->middleware('guest');
Route::post('/admin/login', 'Auth\AdminLoginController@store');
Route::post('/admin/logout', 'Auth\AdminLoginController@destroy')->name('logout');

//Dashboard
Route::get('/dashboard', 'AdminDashboardController@index')->name('dashboard')->middleware('auth');
