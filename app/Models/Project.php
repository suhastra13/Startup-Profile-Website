<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'client_name',
        'client_email',
        'client_phone',
        'project_type', // Web, Mobile, IoT
        'description',
        'price',
        'currency',
        'status', // pending, in_progress, completed, cancelled
        'priority', // low, medium, high
        'start_date',
        'deadline',
        'completed_at',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'start_date' => 'date',
        'deadline' => 'date',
        'completed_at' => 'date',
        'price' => 'decimal:2',
    ];

    // Relasi: Project memiliki banyak Milestone
    public function milestones()
    {
        return $this->hasMany(ProjectMilestone::class);
    }

    // Relasi: Project memiliki banyak Document
    public function documents()
    {
        return $this->hasMany(ProjectDocument::class);
    }

    // Relasi: Dibuat oleh User
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
