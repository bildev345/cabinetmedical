<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicamentRequest;
use App\Http\Requests\UpdateMedicamentRequest;
use App\Models\medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $medicaments = Medicament::all();
    return view('medicaments.create', compact('medicaments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $medicaments = Medicament::all(); // Récupérer tous les médicaments (si nécessaire)
    
    return view('medicaments.create', compact('medicaments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicamentRequest $request)
    {
        Medicament::create($request->all());
        return redirect()->route('medicaments.index')->with('success', 'Médicament ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(medicament $medicament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(medicament $medicament)
{
    return view('medicaments.edit', compact('medicament')); 
}


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicamentRequest $request, medicament $medicament)
    {
        $medicament->update($request->all());
        return redirect()->route('medicaments.index')->with('success','Medicament updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(medicament $medicament)
    {
        $medicament->delete();
        return redirect()->route('medicaments.index')->with('success','Medicament deleted');
    }
}
