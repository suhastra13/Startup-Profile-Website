@extends('admin.layouts.app')

@section('title', 'Manage Blog')
@section('header_title', 'Blog Posts')

@push('styles')
<style>
    /* ============================================
       BLOG INDEX STYLES - CORAL THEME
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

    /* Blog Grid */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
    }

    .blog-card {
        background: white;
        border-radius: 1rem;
        border: 1.5px solid var(--gray-200);
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        border-color: var(--coral);
    }

    .blog-card-image {
        position: relative;
        width: 100%;
        height: 200px;
        background: var(--gray-100);
        overflow: hidden;
    }

    .blog-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .blog-card-image img {
        transform: scale(1.05);
    }

    .blog-card-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--gray-100), var(--gray-50));
        color: var(--gray-400);
        font-size: 3rem;
    }

    .blog-card-badges {
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

    .badge-custom.published {
        background: rgba(16, 185, 129, 0.95);
        color: white;
    }

    .badge-custom.draft {
        background: rgba(245, 158, 11, 0.95);
        color: white;
    }

    .badge-custom.category {
        background: rgba(59, 130, 246, 0.95);
        color: white;
    }

    .blog-card-content {
        padding: 1.25rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-card-title {
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

    .blog-card-slug {
        font-size: 0.8125rem;
        color: var(--coral);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-family: 'Courier New', monospace;
    }

    .blog-card-slug i {
        font-size: 0.75rem;
    }

    .blog-card-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.8125rem;
        color: var(--gray-600);
        padding-top: 0.75rem;
        border-top: 1px solid var(--gray-100);
    }

    .blog-card-meta-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .blog-card-meta-item i {
        color: var(--coral);
        font-size: 0.875rem;
    }

    .blog-card-actions {
        display: flex;
        gap: 0.5rem;
        padding-top: 1rem;
        margin-top: auto;
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

    /* View Toggle */
    .view-toggle {
        display: flex;
        gap: 0.5rem;
        background: var(--gray-100);
        padding: 0.25rem;
        border-radius: 0.5rem;
    }

    .view-toggle-btn {
        padding: 0.5rem 0.75rem;
        border: none;
        background: transparent;
        color: var(--gray-600);
        border-radius: 0.375rem;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .view-toggle-btn.active {
        background: white;
        color: var(--coral);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .view-toggle-btn:hover {
        color: var(--coral);
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

        .blog-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .filter-bar {
            flex-direction: column;
        }

        .search-box {
            min-width: 100%;
        }

        .blog-card-image {
            height: 180px;
        }
    }
</style>
@endpush

@section('content')
<!-- Stats Row -->
<div class="row stats-row">
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon primary">
                <i class="bi bi-file-text-fill"></i>
            </div>
            <div class="stat-card-value">{{ $posts->total() }}</div>
            <div class="stat-card-label">Total Posts</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon success">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-card-value">{{ $posts->where('is_published', true)->count() }}</div>
            <div class="stat-card-label">Published</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon warning">
                <i class="bi bi-file-earmark-fill"></i>
            </div>
            <div class="stat-card-value">{{ $posts->where('is_published', false)->count() }}</div>
            <div class="stat-card-label">Drafts</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-card-icon info">
                <i class="bi bi-grid-fill"></i>
            </div>
            <div class="stat-card-value">{{ $posts->unique('category')->count() }}</div>
            <div class="stat-card-label">Categories</div>
        </div>
    </div>
</div>

<!-- Main Card -->
<div class="modern-card">
    <div class="modern-card-header">
        <h5>
            <i class="bi bi-newspaper"></i>
            All Blog Posts
        </h5>
        <a href="{{ route('admin.blog.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-lg"></i>
            Write New Post
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
                <input type="text" id="searchInput" placeholder="Search posts by title or author...">
            </div>
            <select class="filter-select" id="categoryFilter">
                <option value="">All Categories</option>
                @foreach($posts->unique('category')->pluck('category') as $category)
                <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
            <select class="filter-select" id="statusFilter">
                <option value="">All Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>

        <!-- Blog Grid -->
        @if($posts->count() > 0)
        <div class="blog-grid" id="blogGrid">
            @foreach($posts as $post)
            <div class="blog-card"
                data-title="{{ strtolower($post->title) }}"
                data-author="{{ strtolower($post->author->name ?? 'unknown') }}"
                data-category="{{ $post->category }}"
                data-status="{{ $post->is_published ? 'published' : 'draft' }}">

                <!-- Image -->
                <div class="blog-card-image">
                    @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                    @else
                    <div class="blog-card-image-placeholder">
                        <i class="bi bi-image"></i>
                    </div>
                    @endif

                    <!-- Badges Overlay -->
                    <div class="blog-card-badges">
                        <div>
                            <span class="badge-custom category">{{ $post->category }}</span>
                        </div>
                        <div>
                            @if($post->is_published)
                            <span class="badge-custom published">
                                <i class="bi bi-check-circle-fill"></i>
                                Published
                            </span>
                            @else
                            <span class="badge-custom draft">
                                <i class="bi bi-file-earmark-fill"></i>
                                Draft
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="blog-card-content">
                    <h6 class="blog-card-title">{{ $post->title }}</h6>

                    <div class="blog-card-slug">
                        <i class="bi bi-link-45deg"></i>
                        /{{ $post->slug }}
                    </div>

                    <div class="blog-card-meta">
                        <div class="blog-card-meta-item">
                            <i class="bi bi-person-fill"></i>
                            <span>{{ $post->author->name ?? 'Unknown' }}</span>
                        </div>
                        <div class="blog-card-meta-item">
                            <i class="bi bi-calendar-fill"></i>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="blog-card-actions">
                        <a href="{{ route('admin.blog.edit', $post->id) }}" class="btn-action edit">
                            <i class="bi bi-pencil-fill"></i>
                            Edit
                        </a>
                        <form action="{{ route('admin.blog.destroy', $post->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.');"
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
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>

        @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-file-text-x"></i>
            </div>
            <h3 class="empty-state-title">No Blog Posts Yet</h3>
            <p class="empty-state-text">Start sharing your thoughts and ideas by writing your first blog post.</p>
            <a href="{{ route('admin.blog.create') }}" class="btn-primary-custom">
                <i class="bi bi-plus-lg"></i>
                Write Your First Post
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
        const blogCards = document.querySelectorAll('.blog-card');

        function filterBlogs() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedCategory = categoryFilter.value;
            const selectedStatus = statusFilter.value;

            let visibleCount = 0;

            blogCards.forEach(card => {
                const title = card.dataset.title;
                const author = card.dataset.author;
                const category = card.dataset.category;
                const status = card.dataset.status;

                const matchesSearch = title.includes(searchTerm) || author.includes(searchTerm);
                const matchesCategory = !selectedCategory || category === selectedCategory;
                const matchesStatus = !selectedStatus || status === selectedStatus;

                if (matchesSearch && matchesCategory && matchesStatus) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show "no results" message if needed
            const grid = document.getElementById('blogGrid');
            let noResultsMsg = document.getElementById('noResultsMessage');

            if (visibleCount === 0 && !noResultsMsg) {
                noResultsMsg = document.createElement('div');
                noResultsMsg.id = 'noResultsMessage';
                noResultsMsg.className = 'empty-state';
                noResultsMsg.innerHTML = `
                    <div class="empty-state-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3 class="empty-state-title">No Posts Found</h3>
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
        searchInput.addEventListener('input', filterBlogs);
        categoryFilter.addEventListener('change', filterBlogs);
        statusFilter.addEventListener('change', filterBlogs);
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