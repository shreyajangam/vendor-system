<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorAddress extends Model
{
    use HasFactory;
    //connecting the vendor_address table to model VendorAddress
     protected $table='vendor_address';
        
    //Adding parameters in fillable array for adding, updating details in vendor_address table by post and put Request 
     protected $fillable = ['id',
                          'vendor_id',
                          'address_line_1',
                          'address_line_2',
                          'city',
                          'state',
                          'country_id',
                          'postal_code'];

}
