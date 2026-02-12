<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Fitur Filter & Search
        $query = Project::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('project_name', 'like', '%' . $request->search . '%')
                ->orWhere('client_name', 'like', '%' . $request->search . '%');
        }

        $projects = $query->latest()->paginate(10)->withQueryString();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id(); // Otomatis set pembuat

        $project = Project::create($data);

        // Redirect ke halaman detail (bukan index) agar bisa langsung tambah milestone
        return redirect()->route('admin.projects.show', $project->id)
            ->with('success', 'Project created! Now you can add milestones.');
    }

    public function show(Project $project)
    {
        // Load relasi milestones dan documents untuk tab view
        $project->load(['milestones', 'documents.uploader']);
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('admin.projects.show', $project->id)
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Milestone & Document akan terhapus otomatis (Cascade di database)
        // Tapi file fisik dokumen harus dihapus manual (nanti kita tambahkan logicnya)
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
