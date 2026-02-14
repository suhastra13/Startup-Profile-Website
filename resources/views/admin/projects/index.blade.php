@extends('admin.layouts.app')

@section('title', 'Manage Projects')
@section('header_title', 'Projects List')

@push('styles')
<style>
    /* ============================================
       PROJECTS INDEX - CORAL THEME
    ============================================ */

    :root {
        --coral: #FF6B6B;
        --coral-dark: #FF5252;
        --navy: #1E293B;
        --gray-50: #F9FAFB;
        --gray-100: #F3F4F6;
        --gray-200: #E5E7EB;
        --gray-300: #D1D5DB;
        --gray-400: #9CA3AF;
        --gray-500: #6B7280;
        --gray-600: #4B5563;
        --gray-700: #374151;
    }

    /* Stats Cards */
    .stats-row {
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .stat-card.pending::before {
        background: linear-gradient(180deg, #F59E0B, #D97706);
    }

    .stat-card.in-progress::before {
        background: linear-gradient(180deg, #3B82F6, #2563EB);
    }

    .stat-card.completed::before {
        background: linear-gradient(180deg, #10B981, #059669);
    }

    .stat-card.total::before {
        background: linear-gradient(180deg, var(--coral), var(--coral-dark));
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .stat-card-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .stat-card-icon.pending {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05));
        color: #F59E0B;
    }

    .stat-card-icon.in-progress {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.05));
        color: #3B82F6;
    }

    .stat-card-icon.completed {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
        color: #10B981;
    }

    .stat-card-icon.total {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        color: var(--coral);
    }

    .stat-card-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--navy);
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-card-label {
        font-size: 0.875rem;
        color: var(--gray-600);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Main Card */
    .modern-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .modern-card-header {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        border-bottom: 2px solid var(--gray-100);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .modern-card-header h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modern-card-header h5 i {
        color: var(--coral);
        font-size: 1.5rem;
    }

    .modern-card-body {
        padding: 2rem;
    }

    /* Filter Section */
    .filter-section {
        background: var(--gray-50);
        padding: 1.5rem;
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
        margin-bottom: 2rem;
    }

    .filter-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.5rem;
        display: block;
    }

    .modern-select,
    .modern-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        font-size: 0.9375rem;
        color: var(--gray-700);
        transition: all 0.2s ease;
        background: white;
    }

    .modern-select:focus,
    .modern-input:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.1);
    }

    .modern-input::placeholder {
        color: var(--gray-400);
    }

    /* Buttons */
    .btn-primary-custom {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
        color: white;
    }

    .btn-filter {
        background: white;
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-filter:hover {
        background: var(--gray-50);
        border-color: var(--gray-400);
        color: var(--gray-900);
    }

    .btn-reset {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: 1.5px solid rgba(239, 68, 68, 0.2);
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-reset:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: #EF4444;
        color: #EF4444;
    }

    /* Table Styles */
    .modern-table-wrapper {
        border-radius: 0.75rem;
        overflow: hidden;
        border: 1.5px solid var(--gray-200);
    }

    .modern-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .modern-table thead {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
    }

    .modern-table thead th {
        padding: 1rem 1.25rem;
        font-weight: 700;
        font-size: 0.875rem;
        color: var(--navy);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 2px solid var(--gray-200);
        white-space: nowrap;
    }

    .modern-table tbody td {
        padding: 1.25rem 1.25rem;
        color: var(--gray-700);
        font-size: 0.9375rem;
        border-bottom: 1px solid var(--gray-100);
        vertical-align: middle;
    }

    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }

    .modern-table tbody tr {
        transition: all 0.2s ease;
    }

    .modern-table tbody tr:hover {
        background: var(--gray-50);
    }

    /* Project Name Cell */
    .project-name-link {
        font-weight: 700;
        color: var(--navy);
        text-decoration: none;
        transition: color 0.2s ease;
        display: block;
        margin-bottom: 0.25rem;
    }

    .project-name-link:hover {
        color: var(--coral);
    }

    .project-type {
        font-size: 0.8125rem;
        color: var(--gray-500);
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .project-type i {
        color: var(--coral);
        font-size: 0.875rem;
    }

    /* Client Cell */
    .client-name {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--gray-700);
    }

    .client-avatar {
        width: 2rem;
        height: 2rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.75rem;
        flex-shrink: 0;
    }

    /* Status Badges */
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .status-badge i {
        font-size: 0.75rem;
    }

    .status-badge.pending {
        background: rgba(245, 158, 11, 0.1);
        color: #D97706;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .status-badge.in-progress {
        background: rgba(59, 130, 246, 0.1);
        color: #2563EB;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .status-badge.completed {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .status-badge.cancelled {
        background: rgba(239, 68, 68, 0.1);
        color: #DC2626;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    /* Progress Bar */
    .progress-container {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        min-width: 120px;
    }

    .progress-bar-wrapper {
        height: 8px;
        background: var(--gray-100);
        border-radius: 1rem;
        overflow: hidden;
        position: relative;
    }

    .progress-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--coral), var(--coral-dark));
        border-radius: 1rem;
        transition: width 0.3s ease;
        position: relative;
    }

    .progress-bar-fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .progress-text {
        font-size: 0.8125rem;
        font-weight: 700;
        color: var(--coral);
        text-align: center;
    }

    /* Deadline */
    .deadline-text {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--gray-700);
    }

    .deadline-text i {
        color: var(--coral);
    }

    .deadline-overdue {
        color: #EF4444;
    }

    .deadline-overdue i {
        color: #EF4444;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: nowrap;
    }

    .btn-action {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        flex-shrink: 0;
    }

    .btn-action.view {
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
        border: 1.5px solid rgba(59, 130, 246, 0.2);
    }

    .btn-action.view:hover {
        background: rgba(59, 130, 246, 0.15);
        border-color: #3B82F6;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(59, 130, 246, 0.2);
    }

    .btn-action.edit {
        background: rgba(245, 158, 11, 0.1);
        color: #F59E0B;
        border: 1.5px solid rgba(245, 158, 11, 0.2);
    }

    .btn-action.edit:hover {
        background: rgba(245, 158, 11, 0.15);
        border-color: #F59E0B;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(245, 158, 11, 0.2);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-state-icon {
        width: 5rem;
        height: 5rem;
        margin: 0 auto 1.5rem;
        border-radius: 1rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: var(--coral);
    }

    .empty-state-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 0.5rem;
    }

    .empty-state-text {
        color: var(--gray-600);
        margin-bottom: 1.5rem;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: flex-end;
    }

    /* Mobile Card View */
    .project-card-mobile {
        display: none;
        background: white;
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
        padding: 1.25rem;
        margin-bottom: 1rem;
        transition: all 0.2s ease;
    }

    .project-card-mobile:hover {
        border-color: var(--coral);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.1);
    }

    .project-card-header-mobile {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1.5px solid var(--gray-100);
    }

    .project-card-title-mobile {
        flex: 1;
    }

    .project-card-name-mobile {
        font-weight: 700;
        color: var(--navy);
        font-size: 1rem;
        margin-bottom: 0.375rem;
        text-decoration: none;
        display: block;
    }

    .project-card-name-mobile:hover {
        color: var(--coral);
    }

    .project-card-body-mobile {
        display: flex;
        flex-direction: column;
        gap: 0.875rem;
    }

    .project-card-row-mobile {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    .project-card-label-mobile {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        white-space: nowrap;
    }

    .project-card-value-mobile {
        font-weight: 600;
        color: var(--gray-700);
        text-align: right;
    }

    .project-card-actions-mobile {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1.5px solid var(--gray-100);
        display: flex;
        gap: 0.5rem;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .modern-card-header {
            padding: 1.25rem 1.5rem;
        }

        .modern-card-body {
            padding: 1.5rem;
        }

        .stats-row {
            margin-bottom: 1.5rem;
        }

        .stat-card {
            padding: 1.25rem;
            margin-bottom: 1rem;
        }

        .stat-card-value {
            font-size: 1.75rem;
        }

        .filter-section {
            padding: 1.25rem;
        }

        /* Hide table, show cards on tablets and mobile */
        .modern-table-wrapper {
            display: none;
        }

        .project-card-mobile {
            display: block;
        }

        .action-buttons {
            flex: 1;
        }

        .btn-action {
            flex: 1;
        }
    }

    @media (max-width: 576px) {
        .stat-card-value {
            font-size: 1.5rem;
        }

        .stat-card-label {
            font-size: 0.75rem;
        }

        .filter-section .col-md-3,
        .filter-section .col-md-5,
        .filter-section .col-md-2 {
            margin-bottom: 0.75rem;
        }

        .btn-primary-custom {
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
        }

        .project-card-mobile {
            padding: 1rem;
        }

        .project-card-name-mobile {
            font-size: 0.9375rem;
        }

        .status-badge {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Stats Row -->
<div class="row stats-row">
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="stat-card total">
            <div class="stat-card-icon total">
                <i class="bi bi-folder-fill"></i>
            </div>
            <div class="stat-card-value">{{ $projects->total() }}</div>
            <div class="stat-card-label">Total Projects</div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="stat-card pending">
            <div class="stat-card-icon pending">
                <i class="bi bi-clock-fill"></i>
            </div>
            <div class="stat-card-value">{{ $projects->where('status', 'pending')->count() }}</div>
            <div class="stat-card-label">Pending</div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="stat-card in-progress">
            <div class="stat-card-icon in-progress">
                <i class="bi bi-arrow-repeat"></i>
            </div>
            <div class="stat-card-value">{{ $projects->where('status', 'in_progress')->count() }}</div>
            <div class="stat-card-label">In Progress</div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="stat-card completed">
            <div class="stat-card-icon completed">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-card-value">{{ $projects->where('status', 'completed')->count() }}</div>
            <div class="stat-card-label">Completed</div>
        </div>
    </div>
</div>

<!-- Main Card -->
<div class="modern-card">
    <div class="modern-card-header">
        <h5>
            <i class="bi bi-folder-fill"></i>
            All Projects
        </h5>
        <a href="{{ route('admin.projects.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-lg"></i>
            New Project
        </a>
    </div>

    <div class="modern-card-body">
        <!-- Filter Section -->
        <form action="{{ route('admin.projects.index') }}" method="GET" class="filter-section">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="filter-label">Status</label>
                    <select name="status" class="modern-select">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="filter-label">Search</label>
                    <input
                        type="text"
                        name="search"
                        class="modern-input"
                        placeholder="Search by project name or client..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <label class="filter-label">&nbsp;</label>
                    <button type="submit" class="btn-filter">
                        <i class="bi bi-funnel-fill"></i>
                        Filter
                    </button>
                </div>
                <div class="col-md-2">
                    <label class="filter-label">&nbsp;</label>
                    <a href="{{ route('admin.projects.index') }}" class="btn-reset">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </a>
                </div>
            </div>
        </form>

        <!-- Table (Desktop View) -->
        @if($projects->count() > 0)
        <div class="modern-table-wrapper">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Client</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="project-name-link">
                                {{ $project->project_name }}
                            </a>
                            <div class="project-type">
                                <i class="bi bi-tag-fill"></i>
                                {{ $project->project_type }}
                            </div>
                        </td>
                        <td>
                            <div class="client-name">
                                <div class="client-avatar">
                                    {{ strtoupper(substr($project->client_name, 0, 1)) }}
                                </div>
                                {{ $project->client_name }}
                            </div>
                        </td>
                        <td>
                            <span class="status-badge {{ $project->status }}">
                                @if($project->status === 'pending')
                                <i class="bi bi-clock-fill"></i>
                                @elseif($project->status === 'in_progress')
                                <i class="bi bi-arrow-repeat"></i>
                                @elseif($project->status === 'completed')
                                <i class="bi bi-check-circle-fill"></i>
                                @elseif($project->status === 'cancelled')
                                <i class="bi bi-x-circle-fill"></i>
                                @endif
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </td>
                        <td>
                            @php
                            $total = $project->milestones->count();
                            $completed = $project->milestones->where('status', 'completed')->count();
                            $percentage = $total > 0 ? round(($completed / $total) * 100) : 0;
                            @endphp
                            <div class="progress-container">
                                <div class="progress-bar-wrapper">
                                    <div class="progress-bar-fill" style="width: {{ $percentage }}%"></div>
                                </div>
                                <div class="progress-text">{{ $percentage }}%</div>
                            </div>
                        </td>
                        <td>
                            @if($project->deadline)
                            @php
                            $isOverdue = $project->deadline->isPast() && $project->status !== 'completed';
                            @endphp
                            <div class="deadline-text {{ $isOverdue ? 'deadline-overdue' : '' }}">
                                <i class="bi bi-calendar-event-fill"></i>
                                {{ $project->deadline->format('d M Y') }}
                            </div>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a
                                    href="{{ route('admin.projects.show', $project->id) }}"
                                    class="btn-action view"
                                    title="View Details">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a
                                    href="{{ route('admin.projects.edit', $project->id) }}"
                                    class="btn-action edit"
                                    title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="mobile-cards-container">
            @foreach($projects as $project)
            <div class="project-card-mobile">
                <div class="project-card-header-mobile">
                    <div class="project-card-title-mobile">
                        <a href="{{ route('admin.projects.show', $project->id) }}" class="project-card-name-mobile">
                            {{ $project->project_name }}
                        </a>
                        <div class="project-type">
                            <i class="bi bi-tag-fill"></i>
                            {{ $project->project_type }}
                        </div>
                    </div>
                    <span class="status-badge {{ $project->status }}">
                        @if($project->status === 'pending')
                        <i class="bi bi-clock-fill"></i>
                        @elseif($project->status === 'in_progress')
                        <i class="bi bi-arrow-repeat"></i>
                        @elseif($project->status === 'completed')
                        <i class="bi bi-check-circle-fill"></i>
                        @elseif($project->status === 'cancelled')
                        <i class="bi bi-x-circle-fill"></i>
                        @endif
                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                    </span>
                </div>

                <div class="project-card-body-mobile">
                    <div class="project-card-row-mobile">
                        <span class="project-card-label-mobile">Client</span>
                        <div class="client-name project-card-value-mobile">
                            <div class="client-avatar">
                                {{ strtoupper(substr($project->client_name, 0, 1)) }}
                            </div>
                            {{ $project->client_name }}
                        </div>
                    </div>

                    <div class="project-card-row-mobile">
                        <span class="project-card-label-mobile">Progress</span>
                        @php
                        $total = $project->milestones->count();
                        $completed = $project->milestones->where('status', 'completed')->count();
                        $percentage = $total > 0 ? round(($completed / $total) * 100) : 0;
                        @endphp
                        <div class="progress-container project-card-value-mobile" style="min-width: 100px;">
                            <div class="progress-bar-wrapper">
                                <div class="progress-bar-fill" style="width: {{ $percentage }}%"></div>
                            </div>
                            <div class="progress-text">{{ $percentage }}%</div>
                        </div>
                    </div>

                    <div class="project-card-row-mobile">
                        <span class="project-card-label-mobile">Deadline</span>
                        @if($project->deadline)
                        @php
                        $isOverdue = $project->deadline->isPast() && $project->status !== 'completed';
                        @endphp
                        <div class="deadline-text project-card-value-mobile {{ $isOverdue ? 'deadline-overdue' : '' }}">
                            <i class="bi bi-calendar-event-fill"></i>
                            {{ $project->deadline->format('d M Y') }}
                        </div>
                        @else
                        <span class="text-muted project-card-value-mobile">-</span>
                        @endif
                    </div>
                </div>

                <div class="project-card-actions-mobile">
                    <a
                        href="{{ route('admin.projects.show', $project->id) }}"
                        class="btn-action view"
                        title="View Details">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <a
                        href="{{ route('admin.projects.edit', $project->id) }}"
                        class="btn-action edit"
                        title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>

        @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-folder-x"></i>
            </div>
            <h3 class="empty-state-title">No Projects Found</h3>
            <p class="empty-state-text">
                @if(request('search') || request('status'))
                No projects match your filter criteria. Try adjusting your search.
                @else
                Start managing your projects by creating your first one.
                @endif
            </p>
            @if(!request('search') && !request('status'))
            <a href="{{ route('admin.projects.create') }}" class="btn-primary-custom">
                <i class="bi bi-plus-lg"></i>
                Create First Project
            </a>
            @else
            <a href="{{ route('admin.projects.index') }}" class="btn-reset" style="display: inline-flex; width: auto;">
                <i class="bi bi-arrow-clockwise"></i>
                Clear Filters
            </a>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-submit form when status changes
        const statusSelect = document.querySelector('select[name="status"]');
        if (statusSelect) {
            statusSelect.addEventListener('change', function() {
                this.form.submit();
            });
        }

        // Highlight current filters
        const filterInputs = document.querySelectorAll('.filter-section input, .filter-section select');
        filterInputs.forEach(input => {
            if (input.value) {
                input.style.borderColor = 'var(--coral)';
                input.style.background = 'rgba(255, 107, 107, 0.05)';
            }
        });
    });
</script>
@endpush