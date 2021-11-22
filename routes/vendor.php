<?php

use Illuminate\Support\Facades\Route;

Route::post('image/store-cropper-temp-image', 'ImagesController@storeCropperTempImg')->name('cropper.temp');

Route::group(['namespace' => 'Vendor'], function () {
	Route::group(['middleware' => ['admin']], function () {
		Route::get('add-apartment', 'ApartmentInfoController@apartmentForm')->name('apartment.show');

		Route::get('resource/delete', 'ApartmentInfoController@delete')->name('resource.delete');
		Route::get('resource/edit/{id}', 'ApartmentInfoController@edit')->name('resource.edit');
		Route::post('resource/update/{id}', 'ApartmentInfoController@update')->name('resource.update');
		Route::post('resource/upload/image/{id}', 'ApartmentInfoController@uploadImage')->name('resource.uploadImage');
		Route::get('resource/image/delete', 'ApartmentInfoController@imageDelete')->name('resource.image.delete');
		Route::post('add-apartment', 'ApartmentInfoController@SaveApartmentForm')->name('apartment.add');
		Route::post('apartment/check-phone', 'ApartmentInfoController@checkPhone')->name('apartment.checkPhone');
		Route::post('apartment/check-email', 'ApartmentInfoController@checkEmail')->name('apartment.checkEmail');
		Route::get('resource/edit/get-location', 'ApartmentInfoController@getLocation')->name('resource.edit.getLocation');

	});
	

	Route::get('testData', 'ResourceController@testData');
	Route::get('locations', 'ApartmentInfoController@getLocations')->name('location');
	Route::get('lakes', 'ApartmentInfoController@getLakes')->name('lakes');
	Route::get('rivers', 'ApartmentInfoController@getRivers')->name('rivers');
	

	Route::get('add-entertainment', 'EntertainmentController@entertainmentForm');
	Route::post('add-entertainment', 'EntertainmentController@saveEentertainmentForm');

	Route::get('add-event', 'EventController@eventForm');
	Route::post('add-event', 'EventController@SasveEventForm');

	Route::get('resource', 'ResourceController@index')->name('resources');

	Route::get('resources/{p1?}/{p2?}/{p3?}/{p4?}/{p5?}', 'ResourceController@index')->name('resource');

	// Route::get('menu-filter','ResourceController@menuFilter')->name('menu.filter');

	//Route::get('filter-menu','ResourceController@filterMenu')->name('menu.filter');


	Route::get('resource/{name}/{id}', 'ResourceController@resourceDetails');

	// menu ajax data get
	Route::get('menu/location-lake-river', 'MainMenuController@LocationLakeRiver')->name('location.lake.river');

	Route::get('test', 'TestController@index');

	Route::get('search-result', 'ResourceController@searchResult');
	Route::get('/{p1?}/{p2?}', 'IndexController@index')->name('vendors.all');	
});
