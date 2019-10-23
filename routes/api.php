<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', 'DashboardController@users');
Route::get('/all-users', 'DashboardController@allUsersApi');
Route::post('/add-user/new', 'DashboardController@addUserApi');
Route::post('/add-category/new', 'CategoryController@addCategoryApi');
Route::get('/all/categories', 'CategoryController@allCategoryApi');
Route::post('/add-role', 'DashboardController@addRole');
Route::get('/all-roles/id', 'DashboardController@allRolesIdApi');
Route::put('/update-role/{id}', 'DashboardController@updateRole');
Route::put('/update-user/{id}', 'DashboardController@updateUser');
Route::put('/update-category/{id}', 'CategoryController@updateCategory');
Route::get('/category/get', 'ExpenseController@getCategory');
Route::get('/expenses/all', 'ExpenseController@getExpenses');
Route::post('/add-expense/new', 'ExpenseController@newExpense');