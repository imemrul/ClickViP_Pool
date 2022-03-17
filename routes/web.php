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
Route::get('admin', 'Admin@index');
Route::get('/login','AuthController@index');
Route::post('/login','AuthController@login');
Route::post('/ajax_login','AuthController@ajax_login');
Route::get('/logout','AuthController@logout');
Route::post('registration','AuthController@registration');
Route::get('check_email_availibility','AuthController@check_email_availibility');
Route::get('pool_details/{uri}','HomeController@pool_details');
Route::get('pool/payment/{uri}','HomeController@payment');
Route::get('pool/payment/confirmation/{uri}','HomeController@paymentConfirm');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');





Route::get('get_contact_person','ClientCrud@get_contact_person');
Route::get('get_contact_person_by_client/{client_id}','DealsController@get_contact_person_by_client');
Route::get('get_contact_person_details/{id}','ClientCrud@get_contact_person_details');
Route::get('delete_contact_person/{id}','ClientCrud@delete_contact_person');
Route::get('get_clients','ClientCrud@get_clients');
Route::get('download_client','ClientCrud@download_client');
Route::get('check_existing_client','ClientCrud@check_existing_client');

Route::group(['prefix'=>'module'],function(){

    Route::resource('setting','SettingController');
    Route::resource('page','PageController');  
    Route::any('client/search','ClientCrud@search');
    Route::get('client/prescription/{client_id}','ClientCrud@prescription');
    Route::post('client/create_prescription/{client_id}','ClientCrud@create_prescription');
    Route::get('client/medicine_requisition/{client_id}','ClientCrud@medicine_requisition');
    Route::post('client/save_medicine_requisition/{client_id}','ClientCrud@save_medicine_requisition');
    Route::get('client/search_medicine','ClientCrud@search_medicine');
    Route::resource('client','ClientCrud');

    Route::resource('weekly_session_time','WeeklySessionTime');
    Route::delete('pool/delete_image/{image_id}','PoolController@delete_image');
    Route::delete('pool/delete_session_time_slot/{date}','PoolController@delete_session_time_slot');
    Route::resource('pool','PoolController');

    Route::any('executive/search_call_history','ExecutiveCrud@search_call_history');
    Route::resource('executive','ExecutiveCrud');



});






