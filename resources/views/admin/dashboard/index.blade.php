@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard Overview')

@push('styles')
<style>
    /* ============================================
       STATS CARDS - CORAL THEME
    ============================================ */
    .stats-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--coral), var(--coral-light));
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-color: var(--coral);
    }

    .stats-card-body {
        padding: 2rem;
    }

    .stats-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .stats-icon::before {
        content: '';
        position: absolute;
        inset: 0;
        background: inherit;
        opacity: 0.1;
    }

    .stats-icon i {
        position: relative;
        z-index: 1;
    }

    /* Individual Card Colors */
    .stats-card-coral .stats-icon {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
    }

    .stats-card-navy .stats-icon {
        background: linear-gradient(135deg, var(--navy), var(--navy-light));
        color: white;
    }

    .stats-card-success .stats-icon {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
    }

    .stats-card-warning .stats-icon {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--navy);
        margin: 0.5rem 0;
        line-height: 1;
    }

    .stats-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-700);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.25rem;
    }

    .stats-sublabel {
        font-size: 0.75rem;
        color: var(--gray-500);
        font-weight: 500;
    }

    .stats-card-footer {
        padding: 1rem 2rem;
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }

    .stats-card:hover .stats-card-footer {
        background: rgba(255, 107, 107, 0.05);
    }

    .stats-card-footer a {
        color: var(--coral);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s ease;
    }

    .stats-card-footer a:hover {
        color: var(--coral-dark);
        padding-left: 0.5rem;
    }

    .stats-card-footer i {
        transition: transform 0.2s ease;
    }

    .stats-card-footer a:hover i {
        transform: translateX(4px);
    }

    /* ============================================
       MODERN TABLE
    ============================================ */
    .modern-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .modern-card-header {
        padding: 1.5rem 2rem;
        background: white;
        border-bottom: 2px solid var(--gray-100);
    }

    .modern-card-header h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
        margin: 0;
    }

    .table-modern {
        margin: 0;
    }

    .table-modern thead {
        background: var(--gray-50);
    }

    .table-modern thead th {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--gray-700);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border: none;
        padding: 1rem 1.5rem;
    }

    .table-modern tbody td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        border-color: var(--gray-100);
    }

    .table-modern tbody tr {
        transition: all 0.2s ease;
    }

    .table-modern tbody tr:hover {
        background: rgba(255, 107, 107, 0.03);
    }

    .project-name {
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 0.25rem;
    }

    .project-type {
        font-size: 0.8125rem;
        color: var(--gray-500);
        font-weight: 500;
    }

    /* Status Badges */
    .status-badge {
        padding: 0.375rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .status-pending {
        background: rgba(245, 158, 11, 0.1);
        color: #D97706;
    }

    .status-in-progress {
        background: rgba(255, 107, 107, 0.1);
        color: var(--coral-dark);
    }

    .status-completed {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
    }

    .status-cancelled {
        background: rgba(239, 68, 68, 0.1);
        color: #DC2626;
    }

    /* ============================================
       QUICK ACTIONS CARD
    ============================================ */
    .quick-action-btn {
        padding: 1rem 1.5rem;
        border: 2px solid var(--gray-200);
        border-radius: 0.75rem;
        background: white;
        color: var(--navy);
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .quick-action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 107, 107, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .quick-action-btn:hover::before {
        left: 100%;
    }

    .quick-action-btn:hover {
        border-color: var(--coral);
        color: var(--coral);
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.2);
    }

    .quick-action-btn i {
        font-size: 1.25rem;
        margin-right: 0.75rem;
        color: var(--coral);
    }

    /* System Status */
    .system-status-item {
        padding: 0.875rem 0;
        border-bottom: 1px solid var(--gray-100);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .system-status-item:last-child {
        border-bottom: none;
    }

    .system-status-label {
        font-size: 0.875rem;
        color: var(--gray-600);
        font-weight: 500;
    }

    .system-status-value {
        font-size: 0.875rem;
        color: var(--navy);
        font-weight: 700;
        background: var(--gray-100);
        padding: 0.25rem 0.75rem;
        border-radius: 0.375rem;
    }

    /* ============================================
       BUTTONS
    ============================================ */
    .btn-coral {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }

    .btn-coral:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
        color: white;
    }

    .btn-outline-coral {
        border: 2px solid var(--coral);
        color: var(--coral);
        background: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-coral:hover {
        background: var(--coral);
        color: white;
        transform: translateY(-2px);
    }

    /* Action Button in Table */
    .btn-action {
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 0.5rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--gray-100);
        color: var(--gray-700);
        border: none;
        transition: all 0.2s ease;
    }

    .btn-action:hover {
        background: rgba(255, 107, 107, 0.1);
        color: var(--coral);
        transform: scale(1.1);
    }

    /* Empty State */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--gray-300);
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: var(--gray-500);
        font-size: 1rem;
        font-weight: 500;
    }

    /* ============================================
       RESPONSIVE - MOBILE TABLE
    ============================================ */
    @media (max-width: 768px) {

        /* Force horizontal scroll but optimize spacing */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 -1rem;
        }

        /* Compact table on mobile */
        .table-modern {
            min-width: 600px;
        }

        .table-modern thead th,
        .table-modern tbody td {
            padding: 0.75rem 0.5rem !important;
            font-size: 0.75rem !important;
        }

        /* Status column - prevent wrapping */
        .table-modern thead th:nth-child(4),
        .table-modern tbody td:nth-child(4) {
            min-width: 110px !important;
        }

        /* Status badge - compact size */
        .status-badge {
            padding: 0.375rem 0.625rem !important;
            font-size: 0.625rem !important;
            white-space: nowrap !important;
            letter-spacing: 0.02em !important;
            font-weight: 800 !important;
        }

        /* Project name compact */
        .project-name {
            font-size: 0.8125rem !important;
            margin-bottom: 0.125rem !important;
        }

        .project-type {
            font-size: 0.7rem !important;
        }

        /* Client column */
        .table-modern thead th:nth-child(2),
        .table-modern tbody td:nth-child(2) {
            min-width: 80px !important;
        }

        /* Deadline column */
        .table-modern thead th:nth-child(3),
        .table-modern tbody td:nth-child(3) {
            min-width: 75px !important;
            font-size: 0.7rem !important;
        }

        /* Action column */
        .table-modern thead th:nth-child(5),
        .table-modern tbody td:nth-child(5) {
            min-width: 50px !important;
        }

        /* Action button smaller */
        .btn-action {
            width: 2rem !important;
            height: 2rem !important;
            font-size: 0.875rem !important;
        }

        /* Stats cards smaller on mobile */
        .stats-number {
            font-size: 2rem;
        }

        .stats-card-body {
            padding: 1.5rem;
        }

        .stats-icon {
            width: 3.5rem;
            height: 3.5rem;
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        /* Card headers */
        .modern-card-header {
            padding: 1.25rem 1.5rem;
        }

        .modern-card-header h5 {
            font-size: 1.125rem;
        }

        /* Quick actions on mobile */
        .quick-action-btn {
            padding: 0.875rem 1.25rem;
            font-size: 0.9375rem;
        }

        .quick-action-btn i {
            font-size: 1.125rem;
        }

        /* System status compact */
        .system-status-item {
            padding: 0.75rem 0;
        }

        .system-status-label,
        .system-status-value {
            font-size: 0.8125rem;
        }

        /* Hide mobile cards - we're using optimized table instead */
        .mobile-project-cards {
            display: none !important;
        }
    }

    @media (min-width: 769px) {
        .mobile-project-cards {
            display: none !important;
        }
    }

    /* Mobile Project Card */
    .mobile-project-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 0.75rem;
        padding: 1.25rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .mobile-project-card:hover {
        border-color: var(--coral);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .mobile-project-card:last-child {
        margin-bottom: 0;
    }

    .mobile-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .mobile-card-title {
        font-weight: 700;
        color: var(--navy);
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }

    .mobile-card-subtitle {
        font-size: 0.8125rem;
        color: var(--gray-500);
        font-weight: 500;
    }

    .mobile-card-action {
        flex-shrink: 0;
        margin-left: 1rem;
    }

    .mobile-card-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .mobile-info-item {
        display: flex;
        flex-direction: column;
    }

    .mobile-info-label {
        font-size: 0.7rem;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .mobile-info-value {
        font-size: 0.875rem;
        color: var(--gray-900);
        font-weight: 600;
    }

    .mobile-card-footer {
        padding-top: 1rem;
        border-top: 1px solid var(--gray-100);
    }
</style>
@endpush

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <!-- Active Projects -->
    <div class="col-md-6 col-xl-3">
        <div class="stats-card stats-card-coral h-100">
            <div class="stats-card-body">
                <div class="stats-icon">
                    <i class="bi bi-kanban"></i>
                </div>
                <div class="stats-label">Active Projects</div>
                <div class="stats-number">{{ $stats['projects_active'] }}</div>
                <div class="stats-sublabel">On Progress / Pending</div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.projects.index') }}">
                    View Details
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Blog Posts -->
    <div class="col-md-6 col-xl-3">
        <div class="stats-card stats-card-success h-100">
            <div class="stats-card-body">
                <div class="stats-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div class="stats-label">Blog Posts</div>
                <div class="stats-number">{{ $stats['blogs_published'] }}</div>
                <div class="stats-sublabel">Published Articles</div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.blog.index') }}">
                    Manage Blog
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Unread Messages -->
    <div class="col-md-6 col-xl-3">
        <div class="stats-card stats-card-warning h-100">
            <div class="stats-card-body">
                <div class="stats-icon">
                    <i class="bi bi-envelope"></i>
                </div>
                <div class="stats-label">Unread Messages</div>
                <div class="stats-number">{{ $stats['messages_unread'] }}</div>
                <div class="stats-sublabel">New Inquiries</div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.messages.index') }}">
                    Check Inbox
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Portfolio -->
    <div class="col-md-6 col-xl-3">
        <div class="stats-card stats-card-navy h-100">
            <div class="stats-card-body">
                <div class="stats-icon">
                    <i class="bi bi-briefcase"></i>
                </div>
                <div class="stats-label">Portfolio</div>
                <div class="stats-number">{{ $stats['portfolio_total'] }}</div>
                <div class="stats-sublabel">Total Showcased</div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.portfolios.index') }}">
                    Manage Portfolio
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Row -->
<div class="row g-4">
    <!-- Recent Projects Table -->
    <div class="col-lg-8">
        <div class="modern-card h-100">
            <div class="modern-card-header d-flex justify-content-between align-items-center">
                <h5>Recent Projects</h5>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-coral">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-modern">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Client</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_projects as $project)
                        <tr>
                            <td>
                                <div class="project-name">{{ $project->project_name }}</div>
                                <div class="project-type">{{ $project->project_type }}</div>
                            </td>
                            <td>
                                <span class="fw-semibold text-dark">{{ $project->client_name }}</span>
                            </td>
                            <td>
                                <span class="text-muted">{{ $project->deadline ? $project->deadline->format('d M Y') : '-' }}</span>
                            </td>
                            <td>
                                @php
                                $statusClass = [
                                'pending' => 'status-pending',
                                'in_progress' => 'status-in-progress',
                                'completed' => 'status-completed',
                                'cancelled' => 'status-cancelled'
                                ][$project->status] ?? 'status-pending';
                                @endphp
                                <span class="status-badge {{ $statusClass }}">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn-action">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-0">
                                <div class="empty-state">
                                    <i class="bi bi-folder-x"></i>
                                    <p>No projects found yet. Start by creating your first project!</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card Layout (Hidden on Desktop) -->
            <div class="mobile-project-cards p-3">
                @forelse($recent_projects as $project)
                <div class="mobile-project-card">
                    <div class="mobile-card-header">
                        <div class="flex-grow-1">
                            <div class="mobile-card-title">{{ $project->project_name }}</div>
                            <div class="mobile-card-subtitle">{{ $project->project_type }}</div>
                        </div>
                        <div class="mobile-card-action">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn-action">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mobile-card-info">
                        <div class="mobile-info-item">
                            <div class="mobile-info-label">Client</div>
                            <div class="mobile-info-value">{{ $project->client_name }}</div>
                        </div>
                        <div class="mobile-info-item">
                            <div class="mobile-info-label">Deadline</div>
                            <div class="mobile-info-value">{{ $project->deadline ? $project->deadline->format('d M Y') : '-' }}</div>
                        </div>
                    </div>

                    <div class="mobile-card-footer">
                        @php
                        $statusClass = [
                        'pending' => 'status-pending',
                        'in_progress' => 'status-in-progress',
                        'completed' => 'status-completed',
                        'cancelled' => 'status-cancelled'
                        ][$project->status] ?? 'status-pending';
                        @endphp
                        <span class="status-badge {{ $statusClass }}">
                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="bi bi-folder-x"></i>
                    <p>No projects found yet. Start by creating your first project!</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions Sidebar -->
    <div class="col-lg-4">
        <div class="modern-card h-100">
            <div class="modern-card-header">
                <h5>Quick Actions</h5>
            </div>
            <div class="p-4">
                <!-- Quick Action Buttons -->
                <div class="d-grid gap-3 mb-4">
                    <a href="{{ route('admin.projects.create') }}" class="quick-action-btn">
                        <i class="bi bi-plus-circle-fill"></i>
                        <span>Create New Project</span>
                    </a>
                    <a href="{{ route('admin.blog.create') }}" class="quick-action-btn">
                        <i class="bi bi-pencil-square"></i>
                        <span>Write New Blog Post</span>
                    </a>
                    <a href="{{ route('admin.portfolios.create') }}" class="quick-action-btn">
                        <i class="bi bi-image"></i>
                        <span>Add Portfolio Item</span>
                    </a>
                    <a href="{{ route('admin.team.create') }}" class="quick-action-btn">
                        <i class="bi bi-person-plus-fill"></i>
                        <span>Add Team Member</span>
                    </a>
                </div>

                <hr class="my-4" style="border-color: var(--gray-200);">

                <!-- System Status -->
                <h6 class="text-uppercase fw-bold text-muted mb-3" style="font-size: 0.75rem; letter-spacing: 0.05em;">
                    System Status
                </h6>
                <div>
                    <div class="system-status-item">
                        <span class="system-status-label">Laravel Version</span>
                        <span class="system-status-value">{{ app()->version() }}</span>
                    </div>
                    <div class="system-status-item">
                        <span class="system-status-label">PHP Version</span>
                        <span class="system-status-value">{{ phpversion() }}</span>
                    </div>
                    <div class="system-status-item">
                        <span class="system-status-label">Environment</span>
                        <span class="system-status-value">{{ app()->environment() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection