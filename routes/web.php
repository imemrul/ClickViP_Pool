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

use App\Events\TaskEvent;

Route::get('/', 'HomeController@index');
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
Route::get('dashboard', 'Admin@index');
Route::get('/login','AuthController@index');
Route::post('/login','AuthController@login');
Route::post('/ajax_login','AuthController@ajax_login');
Route::get('/my_account','GuestController@index');
Route::post('profile_update/{user_id}','AuthController@profile_update');
Route::post('login_id_update/{user_id}','AuthController@login_id_update');
Route::post('password_update/{user_id}','AuthController@password_update');

Route::get('/logout','AuthController@logout');


Route::post('registration','AuthController@registration');
Route::get('check_email_availibility','AuthController@check_email_availibility');
Route::get('pool_details/{slug}','HomeController@pool_details');
Route::get('pool/payment/{slug}','HomeController@payment');
Route::get('pool/payment/confirmation/{slug}','HomeController@paymentConfirm');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
Route::POST('/findpool', 'SearchController@findPool')->name('findPool');
Route::get('get_available_slot/{date}','HomeController@get_available_slot');





Route::get('get_contact_person','ClientCrud@get_contact_person');
Route::get('get_contact_person_by_client/{client_id}','DealsController@get_contact_person_by_client');
Route::get('get_contact_person_details/{id}','ClientCrud@get_contact_person_details');
Route::get('delete_contact_person/{id}','ClientCrud@delete_contact_person');
Route::get('get_clients','ClientCrud@get_clients');
Route::get('download_client','ClientCrud@download_client');
Route::get('check_existing_client','ClientCrud@check_existing_client');
Route::get('booking/payment_form','BookingController@payment_form');
Route::post('booking/post_payment','BookingController@post_payment');
Route::get('booking/payment_success/{booking_id}','BookingController@payment_success');
Route::get('booking/payment_unsuccess/{booking_id}','BookingController@payment_unsuccess');
Route::resource('booking','BookingController');

Route::group(['prefix'=>'module'],function(){
    Route::resource('setting','SettingController');
    Route::any('admin_revenue_report','Admin@admin_revenue_report');
    Route::any('admin_payment_report','Admin@admin_payment_report');

    Route::resource('page','PageController');
    Route::any('client/search','ClientCrud@search');
    Route::resource('client','ClientCrud');
    Route::resource('location','LocationController');
    Route::resource('facility','FacilityController');
    Route::resource('weekly_session_time','WeeklySessionTime');
    Route::delete('pool/delete_image/{image_id}','PoolController@delete_image');
    Route::delete('pool/delete_session_time_slot/{date}','PoolController@delete_session_time_slot');
    Route::get('pool/session_alert','PoolController@pool_session_alert');
    Route::get('pool/status_update/{pool_id}','PoolController@status_update');
    Route::resource('pool','PoolController');
    Route::get('host/booking_list','BookingController@host_booking_list');
    Route::any('host/booking_search','BookingController@host_booking_search');
    Route::any('host/revenue_report','BookingController@host_revenue_report');
    Route::any('executive/search_call_history','ExecutiveCrud@search_call_history');
    Route::resource('executive','ExecutiveCrud');
    Route::get('/guest/booking','BookingController@guestBooking');
    Route::get('/guest/paid','BookingController@guestPaid');
    Route::get('/guest/allinvoice','BookingController@guestPaidAll');
    Route::get('/guest/invoice/{id}','BookingController@guestInvoice');
    Route::get('/booking/print_view/{booking_id}','BookingController@print_view');
});

Route::get('{slug}', 'HomeController@page');




