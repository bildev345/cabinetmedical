<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\consultation;
use App\Models\medicament;
use Illuminate\Support\Facades\DB;

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
        'medicament_id' => 'required|array|min:1', // Vérifie qu'au moins un médicament est sélectionné
        'medicament_id.*' => 'exists:medicaments,id',
        'notes' => 'nullable|array',
        'notes.*' => 'nullable|string|max:255',
    ]);

    try {
        // Démarrer une transaction
        DB::beginTransaction();

        // Créer la prescription
        $prescription = Prescription::create([
            'date' => $request->date,
            'rapport' => $request->rapport,
            'consultation_id' => $request->consultation_id,
        ]);

        // Attacher les médicaments avec la note
        foreach ($request->medicament_id as $medicamentId) {
            $note = $request->notes[$medicamentId] ?? null; // Récupérer la note correspondante ou NULL
            $prescription->medicaments()->attach($medicamentId, ['note' => $note]);
        }

        // Valider la transaction
        DB::commit();

        return redirect()->route('prescriptions.index')->with('success', 'Prescription ajoutée avec succès.');
    } catch (\Exception $e) {
        // Annuler la transaction en cas d'erreur
        DB::rollBack();

        return redirect()->route('prescriptions.index')->with('error', 'Une erreur est survenue lors de l\'ajout de la prescription.');
    }
}


    /**
     * Display the specified resource.
     */

     public function show($id)
     {
         $prescription = Prescription::with('medicaments', 'consultation')->findOrFail($id);
         return view('prescriptions.show', compact('prescription'));
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
