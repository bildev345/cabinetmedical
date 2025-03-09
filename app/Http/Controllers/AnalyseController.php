<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analyse;
use App\Models\Consultation;
use App\Models\TypeAnalyse;

class AnalyseController extends Controller
{
    public function index()
    {
        $analyses = Analyse::with('consultation')->get();
        return view('analyses.index', compact('analyses'));
    }

    public function create()
    {
        $consultations = Consultation::all();
        return view('analyses.create', compact('consultations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'consultation_id' => 'required|exists:consultations,id',
        ]);

        Analyse::create([
            'date' => $request->date,
            'consultation_id' => $request->consultation_id,
        ]);

        return redirect()->route('analyses.index')->with('success', 'Analyse ajoutée avec succès.');
    }

    public function edit(Analyse $analyse)
    {
        //$analyse = Analyse::findOrFail($id);
        $consultations = Consultation::all();
        // $consultations = DB::table('consultations')->get();
        $typeAnalyses = TypeAnalyse::all();
        return view('analyses.edit', compact('analyse', 'consultations', 'typeAnalyses'));
        // $analyse, $consultations, $typeAnalyses
    }


    public function update(Request $request, Analyse $analyse)
    {
        $request->validate([
            'date' => 'required|date',
            'consultation_id' => 'required|exists:consultations,id',
        ]);

        $analyse->update($request->all());

        return redirect()->route('analyses.index')->with('success', 'Analyse mise à jour avec succès.');
    }

    public function destroy(Analyse $analyse)
    {
        
        $analyse->resultatAnalyses()->delete();
        $analyse->delete();
        return redirect()->route('analyses.index')->with('success', 'Analyse supprimée avec succès.');
    }
}