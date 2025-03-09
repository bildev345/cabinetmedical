<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeconstantpatientrequest;
use App\Http\Requests\UpdateConstantPatientRequest;
use App\Models\ConstantPatient;
use App\Models\Patient;
use App\Models\Constant;


class ConstantPatientController extends Controller
{
    // Afficher la liste des constantes des patients
    public function index()
    {
        $constantsPatients = ConstantPatient::with(['patient', 'constant'])->get();
        return view('constant_patient.index', compact('constantsPatients'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $patients = Patient::all();
        $constants = Constant::all();
        return view('constant_patient.create', compact('patients', 'constants'));
    }

    // Enregistrer une nouvelle constante

    public function store(Storeconstantpatientrequest $request)
    {
        ConstantPatient::create($request->validated()); 
        return redirect()->route('constant_patient.index')->with('success', 'Constante ajoutée avec succès.');
    }
    
    // Afficher une constante spécifique
    public function show(ConstantPatient $constantPatient)
    {
        //
    }

    // Afficher le formulaire d'édition
    public function edit(ConstantPatient $constantPatient)
    {
        $patients = Patient::all();
        $constants = Constant::all();
        return view('constant_patient.edit', compact('constantPatient', 'patients', 'constants'));
    }

    // Mettre à jour une constante
    public function update(UpdateConstantPatientRequest $request, ConstantPatient $constantPatient)
    {
        $constantPatient->update($request->validated());
        return redirect()->route('constant_patient.index')->with('success', 'Constante mise à jour avec succès.');
    }

    // Supprimer une constante
    public function destroy(ConstantPatient $constantPatient)
    {
        $constantPatient->delete();
        return redirect()->route('constant_patient.index')->with('success', 'Constante supprimée.');
    }

}
