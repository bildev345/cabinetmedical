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
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
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
            return redirect()->route('consultations.index')->with('success', 'Consultation créée avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
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

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'etat_consultation_id' => 'required|exists:etat_consultations,id',
            'patient_id' => 'required|exists:patients,id',
            'type_consultation_id' => 'required|exists:type_consultations,id',
            'rapport' => 'nullable|string',
            'gratuit' => 'boolean',
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->update($request->all());

        // return response()->json(['message' => 'Consultation mise à jour avec succès.']);
        
        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès.');
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
        return view('calendar');
    }

    public function getEvents()
    {
        // $consultations = Consultation::with(['patients', 'etatConsultations', 'typeConsultations'])->get();
        $consultations = Consultation::all();
        $events = [];

        foreach ($consultations as $consultation) {
            $events[] = [
                'id' => $consultation->id, 
                'title' => $consultation->patient->nom . ' ' . $consultation->patient->prenom,
                'start' => $consultation->date_debut,
                'end' => $consultation->date_fin,
                'color' => $consultation->etatConsultation->couleur, // Couleur de l'état
                'textColor' => '#000000', // Couleur du texte (noir)
                'extendedProps' => [
                    'type' => $consultation->typeConsultation->type_consultation,
                    'etat' => $consultation->etatConsultation->etat,
                ],
            ];
        }

        return response()->json($events);
    }

}