<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceType extends Model
{
    protected $fillable = [
        'name', 'description', 'icon', 'ports'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'icon' => 'string',
        'ports' => 'integer'
    ];

    public function devices()
    {
        return $this->hasMany('App\Models\Device', 'type_id', 'id');
    }
}
