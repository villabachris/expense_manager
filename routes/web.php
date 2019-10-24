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


Route::get('/', 'LoginController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/expense/management', 'CategoryController@showCategory');
Route::get('/user/roles', 'DashboardController@roles');
Route::get('/all/users', 'DashboardController@allUsers');
Route::post('/register', 'LoginController@register');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/expense', 'ExpenseController@index');
Route::get('/expense-chart', 'ExpenseController@expenseChart');
