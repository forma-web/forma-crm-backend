<?php

namespace App\Http\Controllers;

use App\Models\DocumentFile;
use Illuminate\Http\Request;

class DocumentFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DocumentFile::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        DocumentFile::firstOrCreate($data);

        return response()->noContent(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $document = DocumentFile::find($id);

        if ($document) {
            return $document;
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $document = DocumentFile::findOrFail($id)->update($request->data);
        return response()->json($document);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $document = DocumentFile::find($id);

        if (! $document instanceof DocumentFile) {
            return response()->json(['message' => 'Позиция не найдена'], 404);
        } else {
            DocumentFile::destroy($id);

            return response()->json(['data' => $document, 'message' => 'Позиция успешно удалена'], 200);
        }
    }
}
