<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;

class VendorController extends Controller
{

/*
|---------------------------------------------------------------
|getVendor function
|---------------------------------------------------------------
|@return the all vendor data in json format.
*/
    
    public function getVendor()
    {
        Log::channel('loginfo')->info("successfully get vendor details");
        return response()->json(Vendor::all(), 200);
    }

/*
|---------------------------------------------------------------
|getVendorbyId function
|---------------------------------------------------------------
|@param $id is the id of vendor table id (primary key)
|@return the vendor details in json format data
*/
    
    public function getVendorById($id) 
    {   
         Log::channel('loginfo')->info("searching vendor details for id");

        $vendor = Vendor::find($id);
        if(is_null($vendor)) 
        {
            Log::channel('loginfo')->info("$id id not found in vendor table");
            return response()->json(['message' => 'Vendor Not Found'], 404);
        }
        Log::channel('loginfo')->info("successfully get vendor details for id");
        
        return response()->json($vendor::find($id), 200);
    }


/*
|----------------------------------------------------------------
|addVendor function
|----------------------------------------------------------------
|@param $request is the request to add data in vendor table
|@return the message vendor data added successfully
|@validate It is for validation for input parameters
*/

    public function addVendor(Request $request) 
    {
        Log::channel('loginfo')->info("validating received input for id");

        $data=$request->validate([
            'id'=>'integer',
            'entity_name'=>'required|string|max:100',
            'entity_type'=>'required|string|max:50',
            'onboarded_date'=>'required|date'
        ]);
        Log::channel('loginfo')->info("validated vendor details successfully id");
        Log::channel('loginfo')->info("Creating vendor data for id");
    
        $vendor = Vendor::create($data);
        Log::channel('loginfo')->info(" created successfully vendor details for id");

        return response()->json(['message' => 'Vendor data added successfully'],201);
    }


/*
|----------------------------------------------------------------
|upadteVendor function
|----------------------------------------------------------------
|@param $id is the id of vendor table id (primary key)
|@return the meassage if id is invalid then vendor  not found
|                     if id is valid and validation is right for input parameters then vendor data updated succeccfully
|@validate It is for validation for input parameters
*/
    public function updateVendor(Request $request, $id) 
    {
        Log::channel('loginfo')->info("searching vendor details for id");

        $vendor = Vendor::find($id);
        if(is_null($vendor)) 
        {
            Log::channel('loginfo')->info("$id id not found in vendor table");
            return response()->json(['message' => 'Vendor Not Found'], 404);
        }
        Log::channel('loginfo')->info("validating received input for id");

        $data=$request->validate([
            'id'=>'integer',
            'vendor_company_name'=>'string|max:100',
            'entity_type'=>'string|max:50',
            'onboarded_date'=>'date'
        ]);
        Log::channel('loginfo')->info("validated vendor details successfully id");
        Log::channel('loginfo')->info("updating vendor details for id");

        $vendor->update($data);
        Log::channel('loginfo')->info(" updated successfully vendor details for id");

        return response()->json(['message' => 'Vendor data updated successfully'], 200);
    }


/*
|---------------------------------------------------------------
|deleteVendor function
|---------------------------------------------------------------
|@param $id is the id of vendor table id (primary key)
|@return the message if id invalid then vendor Not Found
|                    if id valid then vendor details deleted successfully
*/
    public function deleteVendor(Request $request, $id) 
    {
        Log::channel('loginfo')->info("searching vendor  details for id");

        $vendor = Vendor::find($id);
        if(is_null($vendor)) 
        {
            Log::channel('loginfo')->info("$id id not found in vendor table");
            return response()->json(['message' => 'Vendor Not Found'], 404);
        }
        Log::channel('loginfo')->info("deleting vendor details for id");

        $vendor->delete();
        Log::channel('loginfo')->info(" deleted successfully vendor details for id");

        return response()->json(['message' => 'Vendor details deleted successfully'], 200);
    }
}
