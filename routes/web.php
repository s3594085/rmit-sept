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

// Login and Register route
Auth::routes();

// HomeController Route
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// DebugController Route
Route::get('/debug', 'DebugController@index');
Route::get('/debug/{id}', 'DebugController@swapRole');

// EmployeeController Route
Route::get('/manageemployee', 'EmployeeController@manageEmployee')->name('manage_employee');
Route::get('/addemployee', 'EmployeeController@index')->name('add_employee');
Route::get('/employee/delete/{id}', 'EmployeeController@deleteEmployee');
Route::get('/employee/{id}', 'EmployeeController@employeePage');
Route::post('/createemployee', 'EmployeeController@createEmployee')->name('create_employee');

// EmployeeController availability Route
Route::post('/employeeavailability', 'EmployeeController@createAvailability')->name('create_availability');
Route::get('/employeeavailability/delete/{id}', 'EmployeeController@deleteAvailability');

// BookingController Route
Route::post('/createbooking', 'BookingController@createBooking')->name('create_booking');
Route::post('/createcustomerbooking', 'BookingController@createCustomerBooking')->name('create_customer_booking');
Route::get('/bookingsum', 'BookingController@viewAllBooking')->name('booking_sum');
Route::get('/booking/delete/{id}', 'BookingController@deleteBooking')->name('delete_booking');
Route::get('/mybooking', 'BookingController@viewMyBooking')->name('view_my_booking');

// ViewAvailableBooking
Route::get('/viewavailablebooking/{id}', 'BookingController@ViewAvailableBooking');
Route::get('/viewavailablebooking', 'BookingController@ViewAvailableBooking')->name('view_available_booking');

Route::get('/addBooking', 'BookingController@AddBooking')->name('add_booking');
Route::post('/addBooking', 'BookingController@AddBooking')->name('add_booking');
Route::get('/addBooking/{service_id}/{employee_id}', 'BookingController@AddBookingGET');

// Booking Customer
Route::get('/customerbooking/{id}', 'BookingController@CustomerBooking');
Route::get('/customerbooking', 'BookingController@CustomerBooking')->name('booking_cus');

// ServiceController Route
Route::get('/addServices', 'ServiceController@addServices')->name('add_services');
Route::get('/viewServices', 'ServiceController@viewServices')->name('view_services');
Route::post('/addServices', 'ServiceController@createServices')->name('create_services');
