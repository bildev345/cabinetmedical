<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\consultation;
use App\Models\medicament;


use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = Prescription::with('medicaments')->get();
        return view('prescriptions.index', compact('prescriptions'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consultations = consultation::all();
        $medicaments = medicament::all();
        return view('prescriptions.create', compact('consultations', 'medicaments'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'rapport' => 'required|string',
            'consultation_id' => 'required|exists:consultations,id',
            'medicaments' => 'required|array',
            'medicaments.*' => 'exists:medicaments,id',
            'note' => 'nullable|array',
        ]);
    
        // Créer la prescription
        $prescription = Prescription::create([
            'date' => $request->date,
            'rapport' => $request->rapport,
            'consultation_id' => $request->consultation_id,
        ]);
    
        // Attacher les médicaments avec la note dans la table pivot
        foreach ($request->medicaments as $index => $medicamentId) {
            $note = isset($request->note[$index]) ? $request->note[$index] : null; // Récupérer la note correspondante ou null si vide
            $prescription->medicaments()->attach($medicamentId, ['note' => $note]);
        }
    
        return redirect()->route('prescriptions.index')->with('success', 'Prescription ajoutée avec succès.');
    }
    


    /**
     * Display the specified resource.
     */

    public function show(prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prescription $prescription)
{
    // Récupérer toutes les consultations
    $consultations = Consultation::all();  // Ou une condition selon le besoin
    $medicaments = Medicament::all(); // Si nécessaire, récupérer les médicaments

    // Passer les données à la vue
    return view('prescriptions.edit', compact('prescription', 'consultations', 'medicaments'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prescription $prescription)
    {
        $prescription->update($request->all());
        return redirect()->route('prescriptions.index')->with('success',' modifier avec success cette prescriptions ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success','supprimer avec success cette prescription');
    }
}
