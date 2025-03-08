<?php

namespace App\Http\Controllers;

use App\Models\TypeAnalyse;
use Illuminate\Http\Request;

class TypeAnalyseController extends Controller
{
    public function index()
    {
        $type_analyses  = TypeAnalyse::all();
        return view('type_analyses.index', compact('type_analyses'));
    }
    

    public function create()
    {
        return view('type_analyses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_analyse' => 'required|string|unique:type_analyses'
        ]);
        TypeAnalyse::create($request->all());

        return redirect()->route('type_analyses.index')->with('success', 'Type d\'analyse ajouté avec succès.');
    }

    public function edit(TypeAnalyse $type_analyse)
    {
        //$typeAnalyse = TypeAnalyse::findOrFail($id);  
        return view('type_analyses.edit', compact('type_analyse'));
    }

    public function update(Request $request, TypeAnalyse $type_analyse)
    {
        $request->validate([
            'type_analyse' => 'required|string'
        ]);
        $type_analyse->update($request->all());

        return redirect()->route('type_analyses.index')->with('success', 'Type d\'analyse mis à jour avec succès.');
    }

    public function destroy(TypeAnalyse $type_analyse)
    {
        $type_analyse->delete();
        return redirect()->route('type_analyses.index')->with('success', 'Type d\'analyse supprimé avec succès.');
    }
}