<?php

namespace App\Http\Controllers;

use App\Models\TypeConsultation;
use Illuminate\Http\Request;

class TypeConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeConsultations = TypeConsultation::all();
        return view('type_consultations.index', compact('typeConsultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_consultations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_consultation' => 'required|string|max:255',
            'couleur' => 'required|string|max:7', // Format hexadécimal (#FF0000)
        ]);
    
        TypeConsultation::create($request->all());
    
        return redirect()->route('type-consultations.index')->with('success', 'Type de consultation créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeConsultation $typeConsultation)
    {
        return view('type_consultations.edit', compact('typeConsultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeConsultation $typeConsultation)
    {
        $request->validate([
            'type_consultation' => 'required|string|max:255',
            'couleur' => 'required|string|max:7', // Format hexadécimal (#FF0000)
        ]);
    
        $typeConsultation->update($request->all());
    
        return redirect()->route('type-consultations.index')->with('success', 'Type de consultation mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeConsultation $typeConsultation)
    {
        $typeConsultation->delete();
        
        return redirect()->route('type-consultations.index')->with('success', 'Type de consultation supprimé avec succès.');
    }
}
