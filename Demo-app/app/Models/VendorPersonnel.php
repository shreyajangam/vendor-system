<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPersonnel extends Model
{
    use HasFactory;

    //connecting the vendor_personnel table to model VendorAddress
    protected $table='vendor_personnel';

    //Adding parameters in fillable array for adding, updating details in vendor_personnel table by post and put Request 
    protected $fillable = ['id',
                            'vendor_id',
                            'first_name',
                            'last_name',
                            'gender',
                            'mobile',
                            'email',
                            'is_active'];

}
