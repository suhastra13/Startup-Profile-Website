@extends('admin.layouts.app')

@section('title', 'Manage Portfolios')
@section('header_title', 'Portfolio List')

@push('styles')
<style>
    /* ============================================
       PORTFOLIO INDEX STYLES - CORAL THEME
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

    .stat-card-icon.warning {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05));
        color: #F59E0B;
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

    /* Search & Filter Bar */
    .filter-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .search-box {
        flex: 1;
        min-width: 250px;
        position: relative;
    }

    .search-box input {
        width: 100%;
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

    .filter-select {
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.75rem;
        font-size: 0.9375rem;
        font-weight: 500;
        color: var(--gray-700);
        cursor: pointer;
        transition: all 0.2s ease;
        background: white;
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
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

    /* Portfolio Grid */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
    }

    .portfolio-card {
        background: white;
        border-radius: 1rem;
        border: 1.5px solid var(--gray-200);
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .portfolio-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        border-color: var(--coral);
    }

    .portfolio-card-image {
        position: relative;
        width: 100%;
        height: 200px;
        background: var(--gray-100);
        overflow: hidden;
    }

    .portfolio-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .portfolio-card:hover .portfolio-card-image img {
        transform: scale(1.05);
    }

    .portfolio-card-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--gray-100), var(--gray-50));
        color: var(--gray-400);
        font-size: 3rem;
    }

    .portfolio-card-badges {
        position: absolute;
        top: 1rem;
        left: 1rem;
        right: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .badge-custom {
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .badge-custom.featured {
        background: rgba(245, 158, 11, 0.95);
        color: white;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
    }

    .badge-custom.active {
        background: rgba(16, 185, 129, 0.95);
        color: white;
    }

    .badge-custom.draft {
        background: rgba(239, 68, 68, 0.95);
        color: white;
    }

    .badge-custom.category {
        background: rgba(59, 130, 246, 0.95);
        color: white;
    }

    .portfolio-card-content {
        padding: 1.25rem;
    }

    .portfolio-card-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 0.5rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .portfolio-card-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.8125rem;
        color: var(--gray-600);
    }

    .portfolio-card-meta-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .portfolio-card-meta-item i {
        color: var(--coral);
        font-size: 0.875rem;
    }

    .portfolio-card-url {
        font-size: 0.8125rem;
        color: var(--coral);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }

    .portfolio-card-url:hover {
        color: var(--coral-dark);
        text-decoration: underline;
    }

    .portfolio-card-actions {
        display: flex;
        gap: 0.5rem;
        padding-top: 1rem;
        border-top: 1px solid var(--gray-100);
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

    /* Pagination */
    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
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

        .portfolio-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .filter-bar {
            flex-direction: column;
        }

        .search-box {
            min-width: 100%;
        }

        .portfolio-card-image {
            height: 180px;
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
                <i class="bi bi-folder-fill"></i>
            </div>
            <div class="stat-card-value">{{ $portfolios->total() }}</div>
            <div class="stat-card-label">Total Projects</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon success">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-card-value">{{ $portfolios->where('is_active', true)->count() }}</div>
            <div class="stat-card-label">Active Projects</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon warning">
                <i class="bi bi-star-fill"></i>
            </div>
            <div class="stat-card-value">{{ $portfolios->where('is_featured', true)->count() }}</div>
            <div class="stat-card-label">Featured Projects</div>
        </div>
    </div>
</div>

<!-- Main Card -->
<div class="modern-card">
    <div class="modern-card-header">
        <h5>
            <i class="bi bi-grid-3x3-gap-fill"></i>
            All Portfolio Projects
        </h5>
        <a href="{{ route('admin.portfolios.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-lg"></i>
            Add New Project
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

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search projects by title or client...">
            </div>
            <select class="filter-select" id="categoryFilter">
                <option value="">All Categories</option>
                <option value="Web Development">Web Development</option>
                <option value="Mobile App">Mobile App</option>
                <option value="IoT">IoT</option>
                <option value="Design">Design</option>
            </select>
            <select class="filter-select" id="statusFilter">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="draft">Draft</option>
            </select>
        </div>

        <!-- Portfolio Grid -->
        @if($portfolios->count() > 0)
        <div class="portfolio-grid" id="portfolioGrid">
            @foreach($portfolios as $portfolio)
            <div class="portfolio-card"
                data-title="{{ strtolower($portfolio->title) }}"
                data-client="{{ strtolower($portfolio->client ?? '') }}"
                data-category="{{ $portfolio->category }}"
                data-status="{{ $portfolio->is_active ? 'active' : 'draft' }}">

                <!-- Image -->
                <div class="portfolio-card-image">
                    @if($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}">
                    @else
                    <div class="portfolio-card-image-placeholder">
                        <i class="bi bi-image"></i>
                    </div>
                    @endif

                    <!-- Badges Overlay -->
                    <div class="portfolio-card-badges">
                        <div>
                            @if($portfolio->is_featured)
                            <span class="badge-custom featured">
                                <i class="bi bi-star-fill"></i>
                                Featured
                            </span>
                            @endif
                        </div>
                        <div>
                            <span class="badge-custom category">{{ $portfolio->category }}</span>
                            @if($portfolio->is_active)
                            <span class="badge-custom active">Active</span>
                            @else
                            <span class="badge-custom draft">Draft</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="portfolio-card-content">
                    <h6 class="portfolio-card-title">{{ $portfolio->title }}</h6>

                    @if($portfolio->client)
                    <div class="portfolio-card-meta">
                        <div class="portfolio-card-meta-item">
                            <i class="bi bi-person-fill"></i>
                            <span>{{ $portfolio->client }}</span>
                        </div>
                    </div>
                    @endif

                    @if($portfolio->project_url)
                    <a href="{{ $portfolio->project_url }}" target="_blank" class="portfolio-card-url">
                        <i class="bi bi-link-45deg"></i>
                        <span>View Project</span>
                    </a>
                    @endif

                    <!-- Actions -->
                    <div class="portfolio-card-actions">
                        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn-action edit">
                            <i class="bi bi-pencil-fill"></i>
                            Edit
                        </a>
                        <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.');"
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
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $portfolios->links('pagination::bootstrap-5') }}
        </div>

        @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-folder-x"></i>
            </div>
            <h3 class="empty-state-title">No Portfolio Projects Yet</h3>
            <p class="empty-state-text">Start showcasing your amazing work by creating your first portfolio project.</p>
            <a href="{{ route('admin.portfolios.create') }}" class="btn-primary-custom">
                <i class="bi bi-plus-lg"></i>
                Create Your First Project
            </a>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Search and Filter Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const statusFilter = document.getElementById('statusFilter');
        const portfolioCards = document.querySelectorAll('.portfolio-card');

        function filterPortfolios() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedCategory = categoryFilter.value;
            const selectedStatus = statusFilter.value;

            let visibleCount = 0;

            portfolioCards.forEach(card => {
                const title = card.dataset.title;
                const client = card.dataset.client;
                const category = card.dataset.category;
                const status = card.dataset.status;

                const matchesSearch = title.includes(searchTerm) || client.includes(searchTerm);
                const matchesCategory = !selectedCategory || category === selectedCategory;
                const matchesStatus = !selectedStatus || status === selectedStatus;

                if (matchesSearch && matchesCategory && matchesStatus) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show "no results" message if needed
            const grid = document.getElementById('portfolioGrid');
            let noResultsMsg = document.getElementById('noResultsMessage');

            if (visibleCount === 0 && !noResultsMsg) {
                noResultsMsg = document.createElement('div');
                noResultsMsg.id = 'noResultsMessage';
                noResultsMsg.className = 'empty-state';
                noResultsMsg.innerHTML = `
                    <div class="empty-state-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3 class="empty-state-title">No Projects Found</h3>
                    <p class="empty-state-text">Try adjusting your search or filter criteria.</p>
                `;
                grid.parentNode.insertBefore(noResultsMsg, grid);
                grid.style.display = 'none';
            } else if (visibleCount > 0 && noResultsMsg) {
                noResultsMsg.remove();
                grid.style.display = 'grid';
            }
        }

        // Add event listeners
        searchInput.addEventListener('input', filterPortfolios);
        categoryFilter.addEventListener('change', filterPortfolios);
        statusFilter.addEventListener('change', filterPortfolios);
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