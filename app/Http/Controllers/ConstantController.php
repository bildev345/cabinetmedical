<?php

namespace App\Http\Controllers;

use App\Models\Constant;
use Illuminate\Http\Request;

class ConstantController extends Controller
{
    public function index()
    {
        $constants = Constant::all();
        return view('constants.index', compact('constants'));
    }


    public function create()
    {
        return view('constants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'constant' => 'required|string|max:255',
        ]);

        Constant::create($request->all());

        return redirect()->route('constants.index')->with('success', 'Constant created successfully.');
    }

    public function show(Constant $constant)
    {
       //
    }


    public function edit(Constant $constant)
    {
        return view('constants.edit', compact('constant'));
    }


    public function update(Request $request, Constant $constant)
    {
        $request->validate([
            'constant' => 'required|string|max:255',
        ]);

        $constant->update($request->all());

        return redirect()->route('constants.index')->with('success', 'Constant updated successfully.');
    }


    public function destroy(Constant $constant)
    {
        $constant->delete();
        return redirect()->route('constants.index')->with('success', 'Constant deleted successfully.');
    }
}
