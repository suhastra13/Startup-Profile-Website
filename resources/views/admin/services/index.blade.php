@extends('admin.layouts.app')

@section('title', 'Manage Services')
@section('header_title', 'Services List')

@push('styles')
<style>
    /* ============================================
       SERVICE MANAGEMENT STYLES - CORAL THEME
    ============================================ */

    /* Modern Card */
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

    /* Alert Styles */
    .alert-modern {
        border-radius: 0.75rem;
        border: none;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        position: relative;
        display: flex;
        align-items: center;
    }

    .alert-modern i {
        font-size: 1.25rem;
        margin-right: 0.75rem;
    }

    .alert-success-modern {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
        border-left: 4px solid #10B981;
    }

    .alert-success-modern i {
        color: #10B981;
    }

    /* Table Styles */
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
        white-space: nowrap;
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

    /* Number Column */
    .number-cell {
        font-weight: 700;
        color: var(--gray-500);
        font-size: 0.875rem;
    }

    /* Image Thumbnail */
    .service-image {
        width: 80px;
        height: 80px;
        border-radius: 0.75rem;
        object-fit: cover;
        border: 2px solid var(--gray-200);
        transition: all 0.2s ease;
    }

    .service-image:hover {
        transform: scale(1.05);
        border-color: var(--coral);
    }

    .no-image-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: var(--gray-100);
        border-radius: 0.75rem;
        border: 2px dashed var(--gray-300);
        color: var(--gray-400);
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .no-image-badge i {
        font-size: 1.5rem;
        display: block;
        margin-bottom: 0.25rem;
    }

    /* Service Title */
    .service-title {
        font-weight: 600;
        color: var(--navy);
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }

    .service-slug {
        font-family: 'Courier New', monospace;
        color: var(--coral);
        background: rgba(255, 107, 107, 0.08);
        padding: 0.25rem 0.5rem;
        border-radius: 0.375rem;
        font-size: 0.75rem;
        display: inline-block;
        font-weight: 600;
    }

    /* Description */
    .service-description {
        color: var(--gray-600);
        font-size: 0.875rem;
        line-height: 1.5;
    }

    /* Status Badges */
    .status-badge {
        padding: 0.375rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        white-space: nowrap;
    }

    .status-active {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
    }

    .status-inactive {
        background: rgba(107, 114, 128, 0.1);
        color: var(--gray-600);
    }

    /* Action Buttons */
    .btn-action {
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 0.5rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: all 0.2s ease;
        padding: 0;
        margin: 0 0.25rem;
    }

    .btn-edit {
        background: rgba(245, 158, 11, 0.1);
        color: #D97706;
    }

    .btn-edit:hover {
        background: #F59E0B;
        color: white;
        transform: scale(1.1);
    }

    .btn-delete {
        background: rgba(239, 68, 68, 0.1);
        color: #DC2626;
    }

    .btn-delete:hover {
        background: #EF4444;
        color: white;
        transform: scale(1.1);
    }

    /* Create Button */
    .btn-create {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        font-weight: 600;
        padding: 0.625rem 1.5rem;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-create:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
        color: white;
    }

    .btn-create i {
        font-size: 1rem;
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

    .empty-state h6 {
        color: var(--gray-600);
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: var(--gray-500);
        font-size: 0.9375rem;
    }

    /* Close Button for Alert */
    .btn-close-custom {
        background: transparent;
        border: none;
        color: inherit;
        opacity: 0.5;
        padding: 0.5rem;
        cursor: pointer;
        transition: opacity 0.2s ease;
        margin-left: auto;
    }

    .btn-close-custom:hover {
        opacity: 1;
    }

    /* Pagination */
    .pagination-wrapper {
        padding: 1.5rem 2rem;
        border-top: 2px solid var(--gray-100);
        display: flex;
        justify-content: flex-end;
    }

    /* Responsive */
    @media (max-width: 768px) {

        .table-modern thead th,
        .table-modern tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.8125rem;
        }

        .modern-card-header {
            padding: 1.25rem 1.5rem;
        }

        .modern-card-header h5 {
            font-size: 1.125rem;
        }

        .btn-create {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        /* Stack title and button on mobile */
        .card-header-content {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 1rem;
        }

        .btn-action {
            width: 2rem;
            height: 2rem;
            font-size: 0.875rem;
        }

        /* Hide number column on mobile */
        .table-modern thead th:first-child,
        .table-modern tbody td:first-child {
            display: none;
        }

        /* Smaller images on mobile */
        .service-image,
        .no-image-badge {
            width: 60px;
            height: 60px;
        }

        /* Hide description on very small screens */
        @media (max-width: 576px) {

            .table-modern thead th:nth-child(4),
            .table-modern tbody td:nth-child(4) {
                display: none;
            }
        }
    }
</style>
@endpush

@section('content')
<!-- Success Alert -->
@if(session('success'))
<div class="alert-modern alert-success-modern" role="alert">
    <i class="bi bi-check-circle-fill"></i>
    <span>{{ session('success') }}</span>
    <button type="button" class="btn-close-custom" onclick="this.parentElement.style.display='none'">
        <i class="bi bi-x-lg"></i>
    </button>
</div>
@endif

<!-- Main Card -->
<div class="modern-card">
    <div class="modern-card-header">
        <div class="d-flex justify-content-between align-items-center card-header-content">
            <h5>All Services</h5>
            <a href="{{ route('admin.services.create') }}" class="btn-create">
                <i class="bi bi-plus-circle-fill"></i>
                Add New Service
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-modern">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 12%">Image</th>
                    <th style="width: 20%">Service Info</th>
                    <th>Description</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 12%" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $index => $service)
                <tr>
                    <td class="number-cell">{{ $services->firstItem() + $index }}</td>
                    <td>
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}"
                            alt="{{ $service->title }}"
                            class="service-image">
                        @else
                        <div class="no-image-badge">
                            <div>
                                <i class="bi bi-image"></i>
                                <div>No Image</div>
                            </div>
                        </div>
                        @endif
                    </td>
                    <td>
                        <div class="service-title">{{ $service->title }}</div>
                        <span class="service-slug">/{{ $service->slug }}</span>
                    </td>
                    <td>
                        <div class="service-description">
                            {{ Str::limit($service->short_description, 80) }}
                        </div>
                    </td>
                    <td>
                        @if($service->is_active)
                        <span class="status-badge status-active">
                            <i class="bi bi-check-circle-fill me-1"></i>Active
                        </span>
                        @else
                        <span class="status-badge status-inactive">
                            <i class="bi bi-x-circle-fill me-1"></i>Inactive
                        </span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center action-buttons">
                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                class="btn-action btn-edit"
                                title="Edit Service">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn-action btn-delete"
                                    title="Delete Service">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-0">
                        <div class="empty-state">
                            <i class="bi bi-briefcase-fill"></i>
                            <h6>No Services Found</h6>
                            <p>Start by adding your first service offering!</p>
                            <a href="{{ route('admin.services.create') }}" class="btn-create mt-3">
                                <i class="bi bi-plus-circle-fill"></i>
                                Add First Service
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
    <div class="pagination-wrapper">
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection