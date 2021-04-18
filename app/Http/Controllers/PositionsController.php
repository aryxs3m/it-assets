<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{

    private string $viewRoot = "positions";

    public function index()
    {
        $types = Position::all();
        return view("{$this->viewRoot}.index", compact('types'));
    }

    public function edit(Position $model)
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
            $model = Position::find($validated['id']);
            $model->update($validated);
        }
        else
        {
            Position::create($validated);
        }

        return redirect()->to("/{$this->viewRoot}");
    }

    public function deleteConfirm(Position $model)
    {
        return view("{$this->viewRoot}.delete", compact('model'));
    }

    public function delete(Position $model)
    {
        $model->delete();
        return redirect()->to("/{$this->viewRoot}");
    }
}
