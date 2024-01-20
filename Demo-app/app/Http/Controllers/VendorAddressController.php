<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\VendorAddress;

class VendorAddressController extends Controller
{

/*
|---------------------------------------------------------------
|getVendorAddress function
|---------------------------------------------------------------
|@return the vendor address details in json format data
*/
    
public function getVendorAddress()
{
    Log::channel('loginfo')->info("successfully get vendor address details");
    return response()->json(VendorAddress::all(), 200);
}

/*
|---------------------------------------------------------------
|getVendorAddressbyId function
|---------------------------------------------------------------
|@param $id is the id of vendor address table id (primary key)
|@return the vendor address details in json format data
*/

public function getVendorAddressById($id) 
{
    Log::channel('loginfo')->info("searching vendor address details for id");

    $vendor_address = VendorAddress::find($id);
    if(is_null($vendor_address))
    {
        Log::channel('loginfo')->info("$id id not found in vendor address table");
        return response()->json(['message' => 'Vendor Address Not Found'], 404);
    }
    Log::channel('loginfo')->info("successfully get vendor address details for id");

    return response()->json(VendorAddress::find($id), 200);
}


/*
|----------------------------------------------------------------
|addVendorAddress function
|----------------------------------------------------------------
|@param $request is the request to add data in vendor address table
|@return the message vendor data added successfully
|@validate It is for validation for input parameters
*/

public function addVendorAddress(Request $request) 
{
    Log::channel('loginfo')->info("validating received input for id");

    $data=$request->validate([
        'id'=>'integer',
        'vendor_id'=>'integer|exists:vendor,id',
        'address_line_1'=>'required|string|max:500',
        'address_line_2'=>'required|string|max:500',
        'city'=>'required|string|max:50',
        'state'=>'required|string|max:50',
        'country_id'=>'integer|exists:country,id',
        'postal_code'=>'required|string'
    ]);
    Log::channel('loginfo')->info("validated vendor address details successfully id");
    Log::channel('loginfo')->info("Creating vendor address data for id");

    $vendor_address = VendorAddress::create($data);
    Log::channel('loginfo')->info(" created successfully vendor address details for id");

    return response()->json(['message' => 'Vendor address added successfully'],201);
}


/*
|----------------------------------------------------------------
|upadteVendorAddress function
|----------------------------------------------------------------
|@param $id is the id of vendor address table id (primary key)
|@return the meassage if id is invalid then vendor address not found
|                     if id is valid and validation is right for input parameters then vendor data updated succeccfully
|@validate It is for validation for input parameters
*/
public function updateVendorAddress(Request $request, $id) 
{
    Log::channel('loginfo')->info("searching vendor address details for id");

    $vendor_address = VendorAddress::find($id);
    if(is_null($vendor_address)) 
    {
        Log::channel('loginfo')->info("id id not found in vendor address table");
        return response()->json(['message' => 'Vendor Address Not Found'], 404);
    }
    Log::channel('loginfo')->info("validating received input for id");

    $data=$request->validate([
        'id'=>'integer',
        'vendor_id'=>'integer|exists:vendor,id',
        'address_line_1'=>'string|max:500',
        'address_line_2'=>'string|max:500',
        'city'=>'string|max:50',
        'state'=>'string|max:50',
        'country_id'=>'integer|exists:country,id',
        'postal_code'=>'string'
    ]);
    Log::channel('loginfo')->info("validated vendor address details successfully id");
    Log::channel('loginfo')->info("updating vendor address details for id");

    $vendor_address->update($data);
    Log::channel('loginfo')->info(" updated successfully vendor address details for id");

    return response()->json(['message' => 'Vendor Address data updated successfully'], 200);
}


/*
|---------------------------------------------------------------
|deleteVendorAddress function
|---------------------------------------------------------------
|@param $id is the id of vendor address table id (primary key)
|@return the message if id invalid then vendor address Not Found
|                    if id valid then vendor address details deleted successfully
*/
public function deleteVendorAddress(Request $request, $id) 
{
    Log::channel('loginfo')->info("searching vendor address details for id");

    $vendor_address = VendorAddress::find($id);
    if(is_null($vendor_address)) 
    {
        Log::channel('loginfo')->info("$id id not found in vendor adddress table");
        return response()->json(['message' => 'Vendor Address Not Found'], 404);
    }
    Log::channel('loginfo')->info("deleting vendor address details for id");

    $vendor_address->delete();
    Log::channel('loginfo')->info(" deleted successfully vendor address details for id");

    return response()->json(['message' => 'Vendor  Address details deleted successfully'], 200);
}

}
