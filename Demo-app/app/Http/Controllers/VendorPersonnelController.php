<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\VendorPersonnel;

class VendorPersonnelController extends Controller
{

/*
|---------------------------------------------------------------
|getVendorPersonnel function
|---------------------------------------------------------------
|@return the all vendor personnel data in json format.
*/
    
public function getVendorPersonnel()
{
    Log::channel('loginfo')->info("successfully get vendor Personnel details");
    return response()->json(VendorPersonnel::all(), 200);
}

/*
|---------------------------------------------------------------
|getVendorPersonnelbyId function
|---------------------------------------------------------------
|@param $id is the id of vendor personnel table id (primary key)
|@return the vendor personnel details in json format data
*/

public function getVendorPersonnelById($id) 
{
    Log::channel('loginfo')->info("searching vendor personnel details for id");

    $vendor_personnel = VendorPersonnel::find($id);
    if(is_null($vendor_personnel)) 
    {
        Log::channel('loginfo')->info("$id id not found in vendor personnel table");
        return response()->json(['message' => 'Vendor Personnel Not Found'], 404);
    }
    Log::channel('loginfo')->info("successfully get vendor Personnel details for id");

    return response()->json($vendor_personnel::find($id), 200);
}


/*
|----------------------------------------------------------------
|addVendorPersonnel function
|----------------------------------------------------------------
|@param $request is the request to add data in vendor Personnel table
|@return the message vendor Personnel data added successfully
|@validate It is for validation for input parameters
*/

public function addVendorPersonnel(Request $request) 
{
    Log::channel('loginfo')->info("validating received input for id");

    $data=$request->validate([
        'id'=>'integer',
        'vendor_id'=>'required|integer|exists:vendor,id',
        'first_name'=>'required|string|max:100',
        'last_name'=>'required|string|max:100',
        'gender'=>'required|in:male,female,others',
        'mobile'=>'required',
        'email'=>'required|email|max:100',
        'is_active'=>'required|boolean'
    ]);
    Log::channel('loginfo')->info("validated vendor Personnel details successfully id");
    Log::channel('loginfo')->info("Creating vendor Personnel data for id");

    $vendor_personnel = VendorPersonnel::create($data);
    Log::channel('loginfo')->info(" created successfully vendor Personnel details for id");

    return response()->json(['message' => 'Vendor personnel data added successfully'],201);
}


/*
|----------------------------------------------------------------
|upadteVendorPersonnel function
|----------------------------------------------------------------
|@param $id is the id of vendor Personnel table id (primary key)
|@return the meassage if id is invalid then vendor Personnel not found
|                     if id is valid and validation is right for input parameters then vendor Personnel data updated succeccfully
|@validate It is for validation for input parameters
*/
public function updateVendorPersonnel(Request $request, $id) 
{
    Log::channel('loginfo')->info("searching vendor Personnel details for id");

    $vendor_personnel= VendorPersonnel::find($id);
    if(is_null($vendor_personnel)) 
    {            
        Log::channel('loginfo')->info("$id id not found in vendor Personnel table");
        return response()->json(['message' => 'Vendor Personnel Not Found'], 404);
    }
    Log::channel('loginfo')->info("validating received input for id");

    $data=$request->validate([
        'id'=>'integer',
        'vendor_id'=>'integer|exists:vendor,id',
        'first_name'=>'string|max:100',
        'last_name'=>'string|max:100',
        'gender'=>'in:female,male,others',
        'mobile'=>'integer|size:20',
        'email'=>'integer|email|max:100',
        'is_active'=>'boolean'
    ]);
    Log::channel('loginfo')->info("validated vendor Personnel details successfully id");
    Log::channel('loginfo')->info("updating vendor Personnel details for id");

    
    $vendor_personnel->update($data);
    Log::channel('loginfo')->info(" updated successfully vendor Personnel details for id");

    return response()->json(['message' => 'Vendor Personnel data updated successfully'], 200);
}


/*
|---------------------------------------------------------------
|deleteVendorPersonnel function
|---------------------------------------------------------------
|@param $id is the id of vendor Personnel table id (primary key)
|@return the message if id invalid then vendor Personnel Not Found
|                    if id valid then vendor Personnel details deleted successfully
*/
public function deleteVendorPersonnel(Request $request, $id) 
{
    Log::channel('loginfo')->info("searching vendor Personnel details for id");

    $vendor_personnel = VendorPersonnel::find($id);
    if(is_null($vendor_personnel)) 
    {
        Log::channel('loginfo')->info("$id id not found in vendor Personnel table");
        return response()->json(['message' => 'Vendor Personnel Not Found'], 404);
    }
    Log::channel('loginfo')->info("deleting vendor Personnel details for id");

    $vendor_personnel->delete();
    Log::channel('loginfo')->info(" deleted successfully vendor Personnel details for id");

    return response()->json(['message' => 'Vendor Personnel details deleted successfully'], 200);
}

}
