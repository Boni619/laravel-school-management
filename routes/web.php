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
  return view('auth.login');
});

Route::group(['namespace' => 'Auth'], function () {

  Route::get('/', ['as' => 'login-form', 'uses' => 'LoginController@showLoginForm']);
  Route::get('/login', ['as' => 'login-form1', 'uses' => 'LoginController@showLoginForm']);

  /****** Register Routes ******/
  Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'RegisterController@register');

  /****** Login & Logout Routes ******/
  Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@login']);
  Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

  /****** Password Rest Routes ******/
  Route::post('password/email', ['as' => 'password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
  Route::get('password/reset', ['as' => 'password.request', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
  Route::post('password/reset', ['as' => '', 'uses' => 'ResetPasswordController@reset']);
  Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'ResetPasswordController@showResetForm']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
