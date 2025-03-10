<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use App\Models\EtatConsultation;
use App\Models\TypeConsultation;
use Illuminate\Http\Request;


class ConsultationController extends Controller
{
    // Affiche la liste des consultations
    public function index()
    {
        $consultations = Consultation::all();
        return view('consultations.index', compact('consultations'));
    }

    // Affiche le formulaire de création d'une consultation
    public function create()
    {
        $patients = Patient::all();
        $etatConsultations = EtatConsultation::all();
        $typeConsultations = TypeConsultation::all();
        return view('consultations.create', compact('patients', 'etatConsultations', 'typeConsultations'));
    }

    // Enregistre une nouvelle consultation
    public function store(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'nullable|date|after:date_debut',
            'etat_consultation_id' => 'required|exists:etat_consultations,id',
            'patient_id' => 'required|exists:patients,id',
            'type_consultation_id' => 'required|exists:type_consultations,id',
            'rapport' => 'nullable|string',
            'gratuit' => 'required|boolean',
        ]);

        

        try {
            Consultation::create([
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'etat_consultation_id' => $request->etat_consultation_id,
                'patient_id' => $request->patient_id,
                'type_consultation_id' => $request->type_consultation_id,
                'rapport' => $request->rapport,
                'gratuit' => $request->gratuit, 
            ]);
            
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
        }
        
        if($request->wantsJson()) {
            return response()->json($consultations, 201);
        }

        return redirect()->route('consultations.index')->with('success', 'Consultation créée avec succès.');
    }

    // Affiche les détails d'une consultation
    public function show(Consultation $consultation)
    {
        return view('consultations.show', compact('consultation'));
    }

    // Affiche le formulaire de modification d'une consultation
    public function edit($id)
    {
        
        $consultation = Consultation::findOrFail($id);
        $patients = Patient::all();
        $etatConsultations = EtatConsultation::all();
        $typeConsultations = TypeConsultation::all();
        return view('consultations.edit', compact('consultation', 'patients', 'etatConsultations', 'typeConsultations'));
    }

    

    // Met à jour une consultation existante

    public function update(Request $request, Consultation $consultation)
    {
        try {
            $request->validate([
                'date_debut' => 'required|date',
                'date_fin' => 'nullable|date|after:date_debut',
                'etat_consultation_id' => 'required|exists:etat_consultations,id',
                'patient_id' => 'required|exists:patients,id',
                'type_consultation_id' => 'required|exists:type_consultations,id',
            ]);

            $consultation->update($request->all());

            return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès.');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur serveur',
                'error' => $e->getMessage() // Détails de l'erreur
            ], 500);
        }
    }

    // Supprime une consultation

    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée avec succès.');
    }



    public function calendar()
    {
        $patients = Patient::all();
        $etatConsultations = EtatConsultation::all();
        $typeConsultations = TypeConsultation::all();
        
        return view('calendar', compact('patients', 'etatConsultations', 'typeConsultations'));
    }
    
    public function list(Request $request)
    {
        $start = $request->get('start');
        $end = $request->get('end');
        
        $consultations = Consultation::whereBetween('date_debut', [$start, $end])
            ->orWhereBetween('date_fin', [$start, $end])
            ->get()
            ->map(function($consultation) {
                return [
                    'id' => $consultation->id,
                    'title' => $consultation->patient->nom. " ". $consultation->patient->prenom,
                    'start' => $consultation->date_debut,
                    'end' => $consultation->date_fin,
                    'color' => $consultation->etatConsultation->couleur,
                    'extendedProps' => $consultation->toArray()
                ];
            });
        
        return response()->json($consultations);
    }

}