<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Affiche la liste des patients.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Affiche le formulaire de création d'un patient.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Enregistre un nouveau patient en base de données.
     */
    public function store(Request $request)
    {
        // Debug : voir les données envoyées (à activer temporairement si besoin)
        // dd($request->all());

        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20|unique:patients',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:100',
            'tel' => 'required|string|max:20',
            'sexe' => 'required|in:M,F',
            'taille' => 'required|numeric|min:0',
            'poids' => 'required|numeric|min:0',
            'groupe_sangin' => 'required|string|max:5',
            'assure' => 'required|boolean',
        ]);

        // Création du patient
        Patient::create($request->all());

        // Redirection avec message de succès
        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'un patient.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Met à jour un patient en base de données.
     */
    public function update(Request $request, Patient $patient)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20|unique:patients,cin,' . $patient->id,
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:100',
            'tel' => 'required|string|max:20',
            'sexe' => 'required|in:M,F',
            'taille' => 'required|numeric|min:0',
            'poids' => 'required|numeric|min:0',
            'groupe_sangin' => 'required|string|max:5',
            'assure' => 'required|boolean',
        ]);

        // Mise à jour des informations du patient
        $patient->update($request->all());

        // Redirection avec message de succès
        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    /**
     * Supprime un patient de la base de données.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }
}
