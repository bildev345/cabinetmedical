<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\TypeDocument;
use App\Models\Patient;
use DateTime;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Document::with('typeDocument', 'patient')
                        ->orderBy('patient_id');

        if ($search) {
            $query->whereHas('patient', function($q) use ($search) {
                $q->where(function($conCat) use ($search) {
                    $terms = explode(' ', $search);
                    
                    foreach ($terms as $term) {
                        $conCat->where(function($q) use ($term) {
                            $q->where('nom', 'like', "%{$term}%")
                            ->orWhere('prenom', 'like', "%{$term}%");
                        });
                    }

                    $conCat->orWhereRaw("CONCAT(prenom, ' ', nom) LIKE ?", ["%{$search}%"])
                            ->orWhereRaw("CONCAT(nom, ' ', prenom) LIKE ?", ["%{$search}%"]);
                });
            });
        }

        $documents = $query->paginate(10);
        $groupedDocuments = $documents->groupBy('patient_id');

        $error = null;
        if ($search && $documents->isEmpty()) {
            $patientExists = Patient::where(function($q) use ($search) {
                $q->whereRaw("CONCAT(prenom, ' ', nom) LIKE ?", ["%{$search}%"])
                ->orWhereRaw("CONCAT(nom, ' ', prenom) LIKE ?", ["%{$search}%"])
                ->orWhere('nom', 'like', "%{$search}%")
                ->orWhere('prenom', 'like', "%{$search}%");
            })->exists();
            
            $error = $patientExists 
                ? 'Le patient existe mais n\'a aucun document.' 
                : 'Aucun patient trouvé avec ce nom.';
        }

        return view('document.index', compact('documents', 'groupedDocuments', 'error'));
    }

    public function create()
    {
        $typeDocuments = TypeDocument::all();
        $patients = Patient::all();
        return view('document.create', compact('typeDocuments', 'patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'rapport' => 'required',
            'fichier' => 'required|file|max:2048',
            'type_document_id' => 'required|exists:type_documents,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $path = $file->storeAs('documents/' . $request->patient_id, $filename, 'local');
        
            Document::create([
                'date' => $validated['date'],
                'rapport' => $validated['rapport'],
                'fichier' => $path,
                'type_document_id' => $validated['type_document_id'],
                'patient_id' => $validated['patient_id']
            ]);
        }

    return redirect()->route('documents.index')->with('success', 'Document uploaded successfully');
}
    public function edit(Document $document)
    {
        $typeDocuments = TypeDocument::all();
        $patients = Patient::all();
        return view('document.edit', compact('document', 'typeDocuments', 'patients'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'date' => 'required|date',
            'rapport' => 'required',
            'fichier' => 'file|max:2048',
            'type_document_id' => 'required|exists:type_documents,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('fichier')) {
            if ($document->fichier && Storage::disk('local')->exists($document->fichier)) {
                Storage::disk('local')->delete($document->fichier);
            }
            $file = $request->file('fichier');
            $data['fichier'] = $file->store(
                'documents/' . $request->patient_id, 
                'local'
            );
        }

        $document->update($data);

        return redirect()->route('documents.index')->with('message', 'Le document a été modifié avec succès');
    }

    public function destroy(Document $document)
    {
        if ($document->fichier && Storage::disk('local')->exists($document->fichier)) {
            Storage::disk('local')->delete($document->fichier);
        }
        
        $document->delete();

        return redirect()->route('documents.index')->with('message', 'Le document a été supprimé avec succès');
    }

    public function download(Document $document)
    {
        if (!$document->fichier || !Storage::disk('local')->exists($document->fichier)) {
            return redirect()->back()->with('error', 'File not found.');
        }

        return Storage::disk('local')->download(
            $document->fichier,
            'document-' . $document->id . '.' . pathinfo($document->fichier, PATHINFO_EXTENSION)
        );
    }
}