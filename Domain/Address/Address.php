<?php

namespace Domain\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'app_addresses';
    protected $fillable = ['latitude', 'longitude', 'number', 'city', 'state'];
    protected $dates = [];

    // public static $logAttributes = ['latitude', 'longitude', 'number', 'city', 'state'];
    // protected $casts = [];

}
