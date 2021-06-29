<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['name', 'website', 'logo'];

    protected $casts = [
        "name" => 'string',
        "website" => 'string',
        "logo" => 'string'
    ];
}
