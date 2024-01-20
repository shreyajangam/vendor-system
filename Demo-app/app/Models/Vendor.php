<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    //connecting the vendor details table to model vendor
    protected $table='vendor';

    //Adding in fillable array for adding, updating details in vendor table by post and put Request 
    protected $fillable = ['id','entity_name','entity_type','onboarded_date'];

}
