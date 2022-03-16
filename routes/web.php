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
Route::get('/logout','AuthController@logout');

Route::get('event',function(){
   event(new TaskEvent('Hey how are you????'));
});
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
    Route::resource('pool','PoolController');

    Route::any('executive/search_call_history','ExecutiveCrud@search_call_history');
    Route::resource('executive','ExecutiveCrud');

    Route::get('deal/activity/{deal_id}/{activity_type}','DealsController@deal_activity');
    Route::any('deals/search','DealsController@search');
    Route::resource('deals','DealsController');

    Route::get('get_link_with_suggestion/{linked_with}','ActivityController@get_link_with_suggestion');
    Route::get('get_details_of_linked_with/{linked_with}/{id}','ActivityController@get_details_of_linked_with');

    Route::any('activity/search','ActivityController@search');
    Route::resource('activity','ActivityController');

    Route::any('campaign/search','CampaignController@search');
    Route::get('campaign/creative/{creative_id}','CampaignController@creative_report');
    Route::get('campaign/creative_preview/{creative_id}','CampaignController@creative_preview');
    Route::resource('campaign','CampaignController');

});

Route::get('send_daily_activity','Admin@send_daily_activity');
Route::get('send_daily_summary','Admin@send_daily_summary');
Route::get('client_wise_summary','Admin@client_wise_summary');

Route::get('vivo_campaign','LiveStatsController@vivo_campaign');




