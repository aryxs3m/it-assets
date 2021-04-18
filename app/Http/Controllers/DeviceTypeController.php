<?php

namespace App\Http\Controllers;

use App\Models\DeviceType;
use Illuminate\Http\Request;

class DeviceTypeController extends Controller
{

    private string $viewRoot = "types";

    public function index()
    {
        $types = DeviceType::all();
        return view("{$this->viewRoot}.index", compact('types'));
    }

    public function edit(DeviceType $model)
    {
        return view("{$this->viewRoot}.edit", compact('model'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'id' => 'integer|nullable',
            'name' => 'string|required',
            'description' => 'string|nullable'
        ]);

        if($request->exists('id'))
        {
            $model = DeviceType::find($validated['id']);
            $model->update($validated);
        }
        else
        {
            DeviceType::create($validated);
        }

        return redirect()->to("/{$this->viewRoot}");
    }

    public function deleteConfirm(DeviceType $model)
    {
        return view("{$this->viewRoot}.delete", compact('model'));
    }

    public function delete(DeviceType $model)
    {
        $model->delete();
        return redirect()->to("/{$this->viewRoot}");
    }
}
