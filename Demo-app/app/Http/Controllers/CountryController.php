<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Country;

class CountryController extends Controller
{
 
/*
|---------------------------------------------------------------
|getCountry function
|---------------------------------------------------------------
|@return the country details in json format data 
*/
    
public function getCountry()
{
    Log::channel('loginfo')->info("successfully get country details");
    return response()->json(Country::all(), 200);
}

/*
|---------------------------------------------------------------
|getCountrybyId function
|---------------------------------------------------------------
|@param $id is the id of country table id (primary key)
|@return the country details in json format data
*/

public function getCountryById($id) 
{
    Log::channel('loginfo')->info("searching country details");

    $country = Country::find($id);
    if(is_null($country)) 
    {
        Log::channel('loginfo')->info("id not found in country table");
        return response()->json(['message' => 'country Not Found'], 404);
    }
    Log::channel('loginfo')->info("successfully get country details for id");

    return response()->json($country::find($id), 200);
}


/*
|----------------------------------------------------------------
|addCountry function
|----------------------------------------------------------------
|@param $request is the request to add data in Country table
|@return the message country data added successfully
|@validate It is for validation for input parameters
*/

public function addCountry(Request $request) 
{
    Log::channel('loginfo')->info("validating received input for id");

    $data=$request->validate([
        'id'=>'integer',
        'country_name'=>'required|string|max:100',
        'iso_code'=>'required|string|max:3'
    ]);
    Log::channel('loginfo')->info("validated country details successfully id");
    Log::channel('loginfo')->info("Creating country details for id");

    $country = Country::create($data);
    Log::channel('loginfo')->info(" created successfully country details for id");

    return response()->json(['message' => 'country data added successfully'],201);
}


/*
|----------------------------------------------------------------
|upadteVendor function
|----------------------------------------------------------------
|@param $id is the id of country table id (primary key)
|@return the meassage if id is invalid then country not found
|                     if id is valid and validation is right for input parameters then country data updated succeccfully
|@validate It is for validation for input parameters
*/

public function updateCountry(Request $request, $id) 
{
    
    Log::channel('loginfo')->info("searching country details for id");

    $country = Country::find($id);
    if(is_null($country))
    {
        Log::channel('loginfo')->info("$id id not found in country table");
        return response()->json(['message' => 'country Not Found'], 404);
    }

    Log::channel('loginfo')->info("validating received input for id");

    $data=$request->validate([
        'id'=>'integer',
        'country_name'=>'string|max:100',
        'iso_code'=>'string|max:3'
    ]);

    Log::channel('loginfo')->info("validated country details successfully id");
    Log::channel('loginfo')->info("updating country details for id");

    $country->update($data);

    Log::channel('loginfo')->info(" updated successfully country details for id");

    return response()->json(['message' => 'country data updated successfully'], 200);
}


/*
|---------------------------------------------------------------
|deletecountry function
|---------------------------------------------------------------
|@param $id is the id of country table id (primary key)
|@return the message if id invalid then Country Not Found
|                    if id valid then Country details deleted successfully
*/
public function deleteCountry(Request $request, $id) 
{
    Log::channel('loginfo')->info("searching country details for id");

    $country = Country::find($id);
    if(is_null($country)) 
    {
        Log::channel('loginfo')->info("$id id not found in country table");
        return response()->json(['message' => 'Country Not Found'], 404);
    }
    Log::channel('loginfo')->info("deleting country details for id");

    $country->delete();
    Log::channel('loginfo')->info(" deleted successfully country details for id");

    return response()->json(['message' => 'Country details deleted successfully'], 200);
}

}
