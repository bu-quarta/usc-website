<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentStatus;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentController extends Controller
{
    // List all documents with their latest status
    public function index()
    {
        $documents = Document::with(['statuses' => function ($query) {
            $query->orderBy('created_at', 'desc'); // Ensure statuses are ordered
        }])
        ->get()
        ->map(function ($document) {
            $document->latest_status = $document->statuses->first(); // Add the latest status
            unset($document->statuses); // Optionally hide all statuses
            return $document;
        });

        return response()->json($documents);
    }

    // Store a new document and set its initial status
    public function store(Request $request)
{
    // Set a default name if none is provided
    $validated = $request->validate([
        'name' => 'nullable|string|max:255', // Make name optional
    ]);

    $name = $validated['name'] ?? 'Sample Document'; // Default to 'Sample Document' if no name is given

    $document = Document::create([
        'name' => $name,
        'document_format' => $this->generateDocumentFormat(),
    ]);

    // Create initial status
    DocumentStatus::create([
        'document_id' => $document->id,
        'status' => 'PENDING',
    ]);

    return response()->json($document->load('statuses'), 201);
}

    // Show a specific document with its status history
    public function show($id)
    {
        try {
            $document = Document::with('statuses')->findOrFail($id);
            return response()->json($document);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Document not found'], 404);
        }
    }

    // Delete a document and its statuses
    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        // Delete associated statuses first
        $document->statuses()->delete();
        $document->delete();

        return response()->json(['message' => 'Document and its statuses deleted successfully']);
    }

    // Generate a unique document format (e.g., DOC-0001)
    private function generateDocumentFormat()
    {
        $lastDocument = Document::latest('id')->first();
        $nextId = $lastDocument ? $lastDocument->id + 1 : 1;

        return 'DOC-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public function searchByFormat($documentFormat)
{
    try {
        $document = Document::with('statuses')->where('document_format', $documentFormat)->firstOrFail();
        return response()->json($document);
    } catch (ModelNotFoundException $e) {
        return response()->json(['message' => 'Document not found'], 404);
    }
}

}
