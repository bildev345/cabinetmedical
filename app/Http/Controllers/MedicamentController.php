<?php

namespace App\Http\Controllers;

use App\Models\medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicaments=Medicament::all();
        return view ('medicaments.index',compact('medicamtents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('medicaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Medicament::create($request->all());
        return redirect()->route('medicaments.index')->with('success','Medicament created');
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
        return view ('medicaments.edit',compact('medicamtents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, medicament $medicament)
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
