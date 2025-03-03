<?php

namespace App\Http\Controllers;

use App\Models\EtatConsultation;
use Illuminate\Http\Request;

class EtatConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etatConsultations = EtatConsultation::all();
        return view('etat_consultations.index', compact('etatConsultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etat_consultations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'etat' => 'required|string|max:255',
            'couleur' => 'required|string|max:7', // Format hexadécimal (#FF0000)
        ]);
    
        EtatConsultation::create($request->all());
    
        return redirect()->route('etat-consultations.index')->with('success', 'État créé avec succès.');
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
    public function edit(EtatConsultation $etatConsultation)
        {
             return view('etat_consultations.edit', compact('etatConsultation'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EtatConsultation $etatConsultation)
    {
        $request->validate([
            'etat' => 'required|string|max:255',
            'couleur' => 'required|string|max:7', // Format hexadécimal (#FF0000)
        ]);
    
        $etatConsultation->update($request->all());
    
        return redirect()->route('etat-consultations.index')->with('success', 'État mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EtatConsultation $etatConsultation)
    {
        $etatConsultation->delete();
        return redirect()->route('etat-consultations.index')->with('success', 'État supprimé avec succès.');
    }
}
