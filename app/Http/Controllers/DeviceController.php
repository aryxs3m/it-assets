<?php

namespace App\Http\Controllers;

use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::with(['type', 'position'])->get();
        return view('devices', compact('devices'));
    }
}
