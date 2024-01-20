<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    //connecting the country table to model Country
    protected $table='country';

    //Adding parameters in fillable array for adding, updating details in country table by post and put Request 
    protected $fillable = ['id','country_name','iso_code'];

}
