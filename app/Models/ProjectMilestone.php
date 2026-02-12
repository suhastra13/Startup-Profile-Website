<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMilestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'milestone_name',
        'description',
        'due_date',
        'status', // pending, in_progress, completed
        'completed_at',
    ];

    protected $casts = [
        'due_date' => 'date',
        'completed_at' => 'date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
