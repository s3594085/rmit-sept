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
/*
Route::get('/', function () {
    return view('welcome');     //welcome.blade.php
});
*/
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/debug', 'DebugController@index');
Route::get('/debug/{id}', 'DebugController@swapRole');

Route::post('/employee', 'EmployeeController@create')->name('employee');
Route::get('/employee/delete/{id}', 'EmployeeController@delete');

Route::post('/employeeTime', 'EmployeeController@createTime')->name('employeeTime');
Route::get('/employeeTime/delete/{id}', 'EmployeeController@deleteTime');

Route::get('/addnewemp', 'AddnewempController@index');
