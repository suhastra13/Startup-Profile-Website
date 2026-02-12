@extends('admin.layouts.app')

@section('title', 'Manage Team')
@section('header_title', 'Team Members')

@push('styles')
<style>
    /* ============================================
       TEAM INDEX STYLES - CORAL THEME
    ============================================ */

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

    .stat-card-icon.primary {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        color: var(--coral);
    }

    .stat-card-icon.success {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
        color: #10B981;
    }

    .stat-card-icon.info {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.05));
        color: #3B82F6;
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

    .btn-primary-custom i {
        font-size: 1rem;
    }

    /* Alert */
    .modern-alert {
        border-radius: 0.75rem;
        border: none;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .modern-alert.success {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
        border-left: 4px solid #10B981;
        color: #065F46;
    }

    .modern-alert i {
        font-size: 1.25rem;
        color: #10B981;
    }

    .modern-alert .btn-close {
        margin-left: auto;
    }

    /* Search Bar */
    .search-box {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .search-box input {
        width: 100%;
        max-width: 400px;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.75rem;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236B7280' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: 1rem center;
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    /* Team Grid */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .team-card {
        background: white;
        border-radius: 1rem;
        border: 1.5px solid var(--gray-200);
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .team-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        border-color: var(--coral);
    }

    .team-card-header {
        padding: 2rem 1.5rem 1rem;
        text-align: center;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.02), rgba(255, 107, 107, 0.01));
        position: relative;
    }

    .team-card-order {
        position: absolute;
        top: 1rem;
        left: 1rem;
        width: 2rem;
        height: 2rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.875rem;
    }

    .team-card-status {
        position: absolute;
        top: 1rem;
        right: 1rem;
    }

    .badge-custom {
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .badge-custom.active {
        background: rgba(16, 185, 129, 0.1);
        color: #10B981;
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .badge-custom.inactive {
        background: rgba(107, 114, 128, 0.1);
        color: #6B7280;
        border: 1px solid rgba(107, 114, 128, 0.2);
    }

    .team-card-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 1rem;
        border: 4px solid white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
    }

    .team-card-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .team-card-avatar-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .team-card-content {
        padding: 0 1.5rem 1.5rem;
        text-align: center;
    }

    .team-card-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 0.25rem;
    }

    .team-card-position {
        font-size: 0.875rem;
        color: var(--coral);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .team-card-socials {
        display: flex;
        justify-content: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--gray-100);
    }

    .social-link {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--gray-100);
        color: var(--gray-600);
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 1.125rem;
    }

    .social-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .social-link.linkedin {
        background: rgba(10, 102, 194, 0.1);
        color: #0A66C2;
    }

    .social-link.linkedin:hover {
        background: #0A66C2;
        color: white;
    }

    .social-link.github {
        background: rgba(24, 23, 23, 0.1);
        color: #181717;
    }

    .social-link.github:hover {
        background: #181717;
        color: white;
    }

    .social-link.disabled {
        opacity: 0.3;
        pointer-events: none;
    }

    .team-card-actions {
        display: flex;
        gap: 0.5rem;
        padding: 0 1.5rem 1.5rem;
    }

    .btn-action {
        flex: 1;
        padding: 0.625rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-action.edit {
        background: rgba(245, 158, 11, 0.1);
        color: #F59E0B;
        border: 1.5px solid rgba(245, 158, 11, 0.2);
    }

    .btn-action.edit:hover {
        background: rgba(245, 158, 11, 0.15);
        border-color: #F59E0B;
        transform: translateY(-1px);
    }

    .btn-action.delete {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: 1.5px solid rgba(239, 68, 68, 0.2);
    }

    .btn-action.delete:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: #EF4444;
        transform: translateY(-1px);
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

    /* Responsive */
    @media (max-width: 768px) {
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
        }

        .stat-card-value {
            font-size: 1.75rem;
        }

        .team-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .search-box input {
            max-width: 100%;
        }
    }
</style>
@endpush

@section('content')
<!-- Stats Row -->
<div class="row stats-row">
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon primary">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-card-value">{{ $teams->count() }}</div>
            <div class="stat-card-label">Total Members</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon success">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-card-value">{{ $teams->where('is_active', true)->count() }}</div>
            <div class="stat-card-label">Active Members</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon info">
                <i class="bi bi-linkedin"></i>
            </div>
            <div class="stat-card-value">{{ $teams->whereNotNull('linkedin')->count() }}</div>
            <div class="stat-card-label">With LinkedIn</div>
        </div>
    </div>
</div>

<!-- Main Card -->
<div class="modern-card">
    <div class="modern-card-header">
        <h5>
            <i class="bi bi-people-fill"></i>
            All Team Members
        </h5>
        <a href="{{ route('admin.team.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-lg"></i>
            Add Member
        </a>
    </div>

    <div class="modern-card-body">
        <!-- Success Alert -->
        @if(session('success'))
        <div class="modern-alert success alert-dismissible fade show">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Search Bar -->
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Search team members by name or position...">
        </div>

        <!-- Team Grid -->
        @if($teams->count() > 0)
        <div class="team-grid" id="teamGrid">
            @foreach($teams as $team)
            <div class="team-card"
                data-name="{{ strtolower($team->name) }}"
                data-position="{{ strtolower($team->position) }}">

                <!-- Header with Order & Status -->
                <div class="team-card-header">
                    <div class="team-card-order">{{ $team->order }}</div>
                    <div class="team-card-status">
                        @if($team->is_active)
                        <span class="badge-custom active">
                            <i class="bi bi-check-circle-fill"></i>
                            Active
                        </span>
                        @else
                        <span class="badge-custom inactive">
                            <i class="bi bi-dash-circle-fill"></i>
                            Inactive
                        </span>
                        @endif
                    </div>

                    <!-- Avatar -->
                    <div class="team-card-avatar">
                        @if($team->photo)
                        <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}">
                        @else
                        <div class="team-card-avatar-placeholder">
                            {{ substr($team->name, 0, 1) }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Content -->
                <div class="team-card-content">
                    <h6 class="team-card-name">{{ $team->name }}</h6>
                    <div class="team-card-position">{{ $team->position }}</div>

                    <!-- Social Links -->
                    <div class="team-card-socials">
                        @if($team->linkedin)
                        <a href="{{ $team->linkedin }}" target="_blank" class="social-link linkedin" title="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        @else
                        <span class="social-link linkedin disabled">
                            <i class="bi bi-linkedin"></i>
                        </span>
                        @endif

                        @if($team->github)
                        <a href="{{ $team->github }}" target="_blank" class="social-link github" title="GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                        @else
                        <span class="social-link github disabled">
                            <i class="bi bi-github"></i>
                        </span>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="team-card-actions">
                    <a href="{{ route('admin.team.edit', $team->id) }}" class="btn-action edit">
                        <i class="bi bi-pencil-fill"></i>
                        Edit
                    </a>
                    <form action="{{ route('admin.team.destroy', $team->id) }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Are you sure you want to remove this team member?');"
                        style="flex: 1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action delete" style="width: 100%;">
                            <i class="bi bi-trash-fill"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <h3 class="empty-state-title">No Team Members Yet</h3>
            <p class="empty-state-text">Start building your amazing team by adding your first member.</p>
            <a href="{{ route('admin.team.create') }}" class="btn-primary-custom">
                <i class="bi bi-plus-lg"></i>
                Add First Member
            </a>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Search Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const teamCards = document.querySelectorAll('.team-card');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let visibleCount = 0;

            teamCards.forEach(card => {
                const name = card.dataset.name;
                const position = card.dataset.position;

                if (name.includes(searchTerm) || position.includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show "no results" message if needed
            const grid = document.getElementById('teamGrid');
            let noResultsMsg = document.getElementById('noResultsMessage');

            if (visibleCount === 0 && !noResultsMsg) {
                noResultsMsg = document.createElement('div');
                noResultsMsg.id = 'noResultsMessage';
                noResultsMsg.className = 'empty-state';
                noResultsMsg.innerHTML = `
                    <div class="empty-state-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3 class="empty-state-title">No Members Found</h3>
                    <p class="empty-state-text">Try adjusting your search criteria.</p>
                `;
                grid.parentNode.insertBefore(noResultsMsg, grid);
                grid.style.display = 'none';
            } else if (visibleCount > 0 && noResultsMsg) {
                noResultsMsg.remove();
                grid.style.display = 'grid';
            }
        });
    });

    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
</script>
@endsection