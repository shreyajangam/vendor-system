<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*--------------------------Vendor ---------------------------------------------------------*/

//Get all Vendor entites
Route::get('vendors','App\Http\Controllers\VendorController@getVendor');

//Get vendor entites for specific id
Route::get('vendors/{vendorId}','App\Http\Controllers\VendorController@getVendorById');

// Add Vendor 
Route::post('vendors', 'App\Http\Controllers\VendorController@addVendor');

//update vendor
Route::put('vendors/{vendorId}','App\Http\Controllers\VendorController@updateVendor');

//delete vendor
Route::delete('vendors/{vendorId}','App\Http\Controllers\VendorController@deleteVendor');


/*--------------------------Vendor address ---------------------------------------------------------*/


//Get all Vendor Addresses
Route::get('vendorAddresses','App\Http\Controllers\VendorAddressController@getVendorAddress');

//Get vendor Address for specific id
Route::get('vendorAddresses/{vendorAddressId}','App\Http\Controllers\VendorAddressController@getVendorAddressbyId');

// Add Vendor Address 
Route::post('vendorAddresses', 'App\Http\Controllers\VendorAddressController@addVendorAddress');

//update vendor Address
Route::put('vendorAddresses/{vendorAddressId}','App\Http\Controllers\VendorAddressController@updateVendorAddress');

//delete vendor Address
Route::delete('vendorAddresses/{vendorAddressId}','App\Http\Controllers\VendorAddressController@deleteVendorAddress');


/*--------------------------Vendor Personnel table---------------------------------------------------------*/


//Get all Vendor Personnel
Route::get('vendorPersonnels','App\Http\Controllers\VendorPersonnelController@getVendorPersonnel');

//Get vendor Personnel for specific id
Route::get('vendorPersonnels/{vendorPersonnelId}','App\Http\Controllers\VendorPersonnelController@getVendorPersonnelById');

// Add Vendor Personnel
Route::post('vendorPersonnels', 'App\Http\Controllers\VendorPersonnelController@addVendorPersonnel');

//update vendor Personnel
Route::put('vendorPersonnels/{vendorPersonnelId}','App\Http\Controllers\VendorPersonnelController@updateVendorPersonnel');

//delete vendor Personnel
Route::delete('vendorPersonnels/{vendorPersonnelId}','App\Http\Controllers\VendorPersonnelController@deleteVendorPersonnel');


/*--------------------------Vendor country table---------------------------------------------------------*/

//Get all countries
Route::get('countries','App\Http\Controllers\CountryController@getCountry');

//Get vendor country for specific id
Route::get('countries/{countryId}','App\Http\Controllers\CountryController@getCountryById');

// Add Vendor country
Route::post('countries', 'App\Http\Controllers\CountryController@addCountry');

//update vendor country
Route::put('countries/{countryId}','App\Http\Controllers\CountryController@updateCountry');

//delete vendor country
Route::delete('countries/{countryId}','App\Http\Controllers\CountryController@deleteCountry');