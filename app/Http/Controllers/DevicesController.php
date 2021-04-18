<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DevicesController extends Controller
{

    private string $viewRoot = "devices";

    public function index()
    {
        $types = Device::all();
        return view("{$this->viewRoot}.index", compact('types'));
    }

    public function edit(Device $model)
    {
        return view("{$this->viewRoot}.edit", compact('model'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'id' => 'integer|nullable',
            'name' => 'string|required',
            'ip' => 'string|required',
            'description' => 'string|nullable',
            'type_id' => 'integer|required|exists:device_types,id',
            'position_id' => 'integer|required|exists:positions,id',
        ]);

        if($request->exists('id'))
        {
            $model = Device::find($validated['id']);
            $model->update($validated);
        }
        else
        {
            Device::create($validated);
        }

        return redirect()->to("/{$this->viewRoot}");
    }

    public function deleteConfirm(Device $model)
    {
        return view("{$this->viewRoot}.delete", compact('model'));
    }

    public function delete(Device $model)
    {
        $model->delete();
        return redirect()->to("/{$this->viewRoot}");
    }
}
