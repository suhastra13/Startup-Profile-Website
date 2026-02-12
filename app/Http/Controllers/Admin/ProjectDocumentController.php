<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectDocumentController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'document_name' => 'required|string|max:255',
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        // 1. Upload File Fisik
        $file = $request->file('file');
        $path = $file->store('project_documents', 'public');

        // 2. Simpan ke Database
        $project->documents()->create([
            'document_name' => $request->document_name,
            'file_path' => $path,
            'file_size' => $this->formatBytes($file->getSize()),
            'uploaded_by' => Auth::id(),
        ]);

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function destroy(Project $project, ProjectDocument $document)
    {
        // Hapus file fisik dulu
        if (Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        // Hapus data di database
        $document->delete();

        return back()->with('success', 'Document deleted.');
    }

    // Download Helper
    public function download(Project $project, ProjectDocument $document)
    {
        return Storage::disk('public')->download($document->file_path, $document->document_name . '.' . pathinfo($document->file_path, PATHINFO_EXTENSION));
    }

    // Helper function untuk format ukuran file (KB/MB)
    private function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}
