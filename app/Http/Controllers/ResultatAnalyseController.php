<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultatAnalyse;
use App\Models\Analyse;
use App\Models\TypeAnalyse;
use App\Http\Requests\UpdateResultatAnalyseRequest;

class ResultatAnalyseController extends Controller
{
    public function index()
    {
        $resultats_analyses  = ResultatAnalyse::with(['analyse', 'type_Analyse'])->get();
        return view('resultats_analyses.index', compact('resultats_analyses'));
    }

    public function create()
    {
        $analyses = Analyse::all();
        $typeAnalyses = TypeAnalyse::all();
        return view('resultats_analyses.create', compact('analyses', 'typeAnalyses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'analyse_id' => 'required|exists:analyses,id',
            'type_analyse_id' => 'required|exists:type_analyses,id',
            'resultat' => 'required|string',
        ]);

        ResultatAnalyse::create($request->all());
        return redirect()->route('resultats_analyses.index')->with('success', 'Résultat ajouté avec succès.');
    }
    public function edit(ResultatAnalyse $resultatAnalyse)
    {
        //$resultatAnalyse = ResultatAnalyse::findOrFail($id);
        $analyses = Analyse::all();
        $typeAnalyses = TypeAnalyse::all();
        return view('resultats_analyses.edit', compact('resultatAnalyse', 'analyses', 'typeAnalyses'));
    }

    public function update(UpdateResultatAnalyseRequest $request, ResultatAnalyse $resultatAnalyse)
    {
        $resultatAnalyse->update($request->all());
        return redirect()->route('resultats_analyses.index')->with('success', 'Résultat mis à jour avec succès.');
    }

    public function destroy(ResultatAnalyse $resultatAnalyse)
    {
        $resultatAnalyse->delete();
        return redirect()->route('resultats_analyses.index')->with('success', 'Résultat supprimé avec succès.');
    }
}