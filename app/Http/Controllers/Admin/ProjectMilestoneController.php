<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMilestone;
use Illuminate\Http\Request;

class ProjectMilestoneController extends Controller
{
    // Simpan Milestone Baru
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'milestone_name' => 'required|string|max:255',
            'due_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $project->milestones()->create([
            'milestone_name' => $request->milestone_name,
            'due_date' => $request->due_date,
            'description' => $request->description,
            'status' => 'pending' // Default status
        ]);

        return back()->with('success', 'Milestone added successfully.');
    }

    // Update Status Milestone (Misal: dari Pending ke Completed)
    public function update(Request $request, Project $project, ProjectMilestone $milestone)
    {
        // Validasi simpel: hanya status yang diubah
        $milestone->update([
            'status' => 'completed',
            'completed_at' => now()
        ]);

        return back()->with('success', 'Milestone marked as completed.');
    }

    // Hapus Milestone
    public function destroy(Project $project, ProjectMilestone $milestone)
    {
        $milestone->delete();
        return back()->with('success', 'Milestone deleted.');
    }
}
