<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $deviceCount = Device::all()->count();
        $deviceTypes = DeviceType::with('devices')->get();
        return view('welcome', compact(
            'deviceCount',
            'deviceTypes'
        ));
    }
}
