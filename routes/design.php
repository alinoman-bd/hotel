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
Route::group(['namespace' => 'Design'], function () {
	Route::get('/index', 'IndexController@index');
	Route::get('/information-form', 'IndexController@informationForm');
	Route::get('/faq', 'IndexController@faq');
	Route::get('/details', 'IndexController@details');
	Route::get('/profile', 'IndexController@profile');;
	Route::get('/search-result', 'IndexController@searchResult');
});
