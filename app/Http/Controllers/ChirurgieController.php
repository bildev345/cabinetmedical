<?php

namespace App\Http\Controllers;

use App\Models\Chirurgie;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChirurgieRequest;
use App\Http\Requests\UpdateChirurgieRequest;

class ChirurgieController extends Controller
{
    public function index()
    {
        $chirurgies = Chirurgie::with('consultation')->get();
        return view('chirurgies.index', compact('chirurgies'));
    }

    public function create()
    {
        $consultations = Consultation::all();
        return view('chirurgies.create', compact('consultations'));
    }

    public function store(StoreChirurgieRequest $request)
    {      Chirurgie::create($request->validated());
        return redirect()->route('chirurgies.index')->with('success', 'Chirurgie ajoutée avec succès.');
        // $request->validate([
        //     'date' => 'required|date',
        //     'libelle_chirurgie' => 'required|string|max:225',
        //     'observation' => 'nullable|string',
        //     'consultation_id' => 'required|exists:consultations,id',
        // ]);

        // Chirurgie::create($request->all());

        // return redirect()->route('chirurgies.index')->with('success', 'Chirurgie ajoutée avec succès.');
    }

    public function show(Chirurgie $chirurgie)
    {
        //
    }

    public function edit(Chirurgie $chirurgie)
    {
        $consultations = Consultation::all();
        return view('chirurgies.edit', compact('chirurgie', 'consultations'));
    }

//public function update(UpdateChirurgieRequest $request, Chirurgie $chirurgy)

public function update(UpdateChirurgieRequest $request, Chirurgie $chirurgie)
{
    // $request->validate([
    //     'date' => 'required|date',
    //     'libelle_chirurgie' => 'required|string|max:225',
    //     'observation' => 'nullable|string',
    //     'consultation_id' => 'required|exists:consultations,id',
    // ]);

    // $chirurgie->update($request->all());

    // return redirect()->route('chirurgies.index')->with('success', 'Chirurgie mise à jour avec succès.');

    $chirurgie->update($request->validated());
        return redirect()->route('chirurgies.index')->with('success', 'Chirurgie mise à jour avec succès.');
}


    public function destroy(Chirurgie $chirurgie)
    {
        $chirurgie->delete();
        return redirect()->route('chirurgies.index')->with('success', 'Chirurgie supprimée avec succès.');
    }
}
