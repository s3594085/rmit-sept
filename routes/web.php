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

Route::get('/manageemployee', 'EmployeeController@manage')->name('manage_employee');
Route::get('/addemployee', 'EmployeeController@index')->name('add_employee');
Route::get('/employee/delete/{id}', 'EmployeeController@delete');
Route::get('/employee/{id}', 'EmployeeController@page');
Route::post('/createemployee', 'EmployeeController@create')->name('create_employee');

Route::post('/employeeavailability', 'EmployeeController@createAvailability')->name('create_availability');
Route::get('/employeeavailability/delete/{id}', 'EmployeeController@deleteAvailability');

Route::get('/bookingsum', 'bookingsumController@index');
