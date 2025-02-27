<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeDocument;

class TypeDocumentController extends Controller
{
    public function create(Request $request)
    {
        $typeDocuments = TypeDocument::with('documents')->get();
        return view('type_document.create', compact('typeDocuments'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'type_document' => 'required|string|max:255',
        ]);
        TypeDocument::create($request->all());
        return redirect()->route('documents.index')->with('successType', 'Type de document créé avec succès.');
    }
    public function edit(TypeDocument $typeDocument)
    {
        $typeDocuments = TypeDocument::all();
        return view('type_document.edit', compact('typeDocument', 'typeDocuments'));
    }
    public function update(Request $request, TypeDocument $typeDocument)
    {
        $request->validate([
            'type_document' => 'required|string|max:255',
        ]);
        $typeDocument->update($request->all());
        return redirect()->route('documents.index')->with('successUpdate', 'Type de document modifié avec succès.');
    }
    // public function destroy(TypeDocument $typeDocument)
    // {
    //     $typeDocument->delete();
    //     return redirect()->route('documents.index')->with('successDeleteType', 'Type de document supprimé avec succès.');
    // }
}
