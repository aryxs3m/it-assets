<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name', 'description', 'ip', 'type_id', 'position_id'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'ip' => 'string',
        'type_id' => 'integer',
        'position_id' => 'integer',
        'product_id' => 'integer',
    ];

    public function type()
    {
        return $this->hasOne('App\Models\DeviceType', 'id', 'type_id');
    }

    public function position()
    {
        return $this->hasOne('App\Models\Position', 'id', 'position_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
