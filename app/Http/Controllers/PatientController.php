<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(StorePatientRequest $request)
    {
        dd($request->all()); 

        Patient::create($request->validated());

        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès.');
    }

    
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        
        dd($request->all());

        
        DB::enableQueryLog();

        $patient->update($request->validated());

        
        dd(DB::getQueryLog());

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }


    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }
}
