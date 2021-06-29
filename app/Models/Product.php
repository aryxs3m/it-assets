<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'device_type_id', 'manufacturer_id'];

    protected $casts = [
        'name' => 'string',
        'device_type_id' => 'integer',
        'manufacturer_id' => 'integer',
    ];
}
