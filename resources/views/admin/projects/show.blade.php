@extends('admin.layouts.app')

@section('title', 'Project Details')
@section('header_title', 'Project Details')

@push('styles')
<style>
    /* ============================================
       PROJECT DETAILS - CORAL THEME
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

    /* Page Header */
    .project-header {
        background: white;
        border-radius: 1rem;
        padding: 2rem 2.5rem;
        margin-bottom: 2rem;
        border: 1px solid var(--gray-200);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .project-header-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .project-title-section h3 {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--navy);
        margin-bottom: 0.75rem;
    }

    .project-type-badge {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        color: var(--coral);
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: 1px solid rgba(255, 107, 107, 0.2);
    }

    .project-actions {
        display: flex;
        gap: 0.75rem;
    }

    .btn-modern {
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        font-size: 0.9375rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-modern i {
        font-size: 1rem;
    }

    .btn-edit {
        background: rgba(245, 158, 11, 0.1);
        color: #D97706;
        border: 1.5px solid rgba(245, 158, 11, 0.2);
    }

    .btn-edit:hover {
        background: rgba(245, 158, 11, 0.15);
        border-color: #F59E0B;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
    }

    .btn-back {
        background: white;
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
    }

    .btn-back:hover {
        background: var(--gray-50);
        border-color: var(--gray-400);
        color: var(--gray-900);
    }

    /* Main Card */
    .modern-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Tabs */
    .modern-tabs {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        padding: 0 2rem;
        border-bottom: 2px solid var(--gray-200);
        display: flex;
        gap: 0.5rem;
    }

    .modern-tab {
        padding: 1.25rem 1.5rem;
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        color: var(--gray-600);
        font-weight: 600;
        font-size: 0.9375rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        position: relative;
    }

    .modern-tab:hover {
        color: var(--coral);
        background: rgba(255, 107, 107, 0.05);
    }

    .modern-tab.active {
        color: var(--coral);
        border-bottom-color: var(--coral);
    }

    .tab-badge {
        padding: 0.25rem 0.625rem;
        border-radius: 0.5rem;
        background: var(--coral);
        color: white;
        font-size: 0.75rem;
        font-weight: 700;
        min-width: 1.5rem;
        text-align: center;
    }

    .modern-tab:not(.active) .tab-badge {
        background: var(--gray-300);
        color: var(--gray-700);
    }

    .modern-card-body {
        padding: 2.5rem;
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

    /* Tab Content */
    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    /* Overview Tab */
    .overview-grid {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 3rem;
    }

    .overview-main h5 {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .overview-main h5 i {
        color: var(--coral);
    }

    .project-description {
        color: var(--gray-600);
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        margin-top: 2rem;
    }

    .info-table {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .info-row {
        display: flex;
        align-items: center;
        padding: 0.75rem 0;
    }

    .info-label {
        flex: 0 0 140px;
        font-weight: 600;
        color: var(--gray-500);
        font-size: 0.875rem;
    }

    .info-value {
        flex: 1;
        font-weight: 600;
        color: var(--gray-900);
    }

    .info-value.price {
        color: var(--coral);
        font-size: 1.125rem;
    }

    .info-value .status-badge {
        padding: 0.375rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .info-value .status-badge.pending {
        background: rgba(245, 158, 11, 0.1);
        color: #D97706;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .info-value .status-badge.in_progress {
        background: rgba(59, 130, 246, 0.1);
        color: #2563EB;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .info-value .status-badge.completed {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .info-value .status-badge.cancelled {
        background: rgba(239, 68, 68, 0.1);
        color: #DC2626;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .priority-badge {
        padding: 0.375rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .priority-badge.high {
        background: rgba(239, 68, 68, 0.1);
        color: #DC2626;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .priority-badge.medium {
        background: rgba(245, 158, 11, 0.1);
        color: #D97706;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .priority-badge.low {
        background: rgba(59, 130, 246, 0.1);
        color: #2563EB;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    /* Progress Sidebar */
    .progress-sidebar {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        padding: 2rem;
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
        border-left: 4px solid var(--coral);
    }

    .progress-sidebar h6 {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .progress-value {
        font-size: 4rem;
        font-weight: 900;
        color: var(--coral);
        line-height: 1;
        text-align: center;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .progress-bar-custom {
        height: 12px;
        background: var(--gray-200);
        border-radius: 1rem;
        overflow: hidden;
        margin-bottom: 1rem;
        position: relative;
    }

    .progress-bar-fill-custom {
        height: 100%;
        background: linear-gradient(90deg, var(--coral), var(--coral-dark));
        border-radius: 1rem;
        transition: width 0.5s ease;
        position: relative;
    }

    .progress-bar-fill-custom::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: shimmer 2s infinite;
    }

    .progress-subtitle {
        text-align: center;
        font-size: 0.875rem;
        color: var(--gray-600);
        font-weight: 600;
    }

    .progress-subtitle strong {
        color: var(--coral);
    }

    /* Milestones Tab */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .section-header h5 {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--navy);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-header h5 i {
        color: var(--coral);
    }

    .btn-add {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        font-weight: 600;
        padding: 0.625rem 1.25rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
    }

    /* Timeline */
    .timeline {
        position: relative;
        padding-left: 2rem;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 0.5rem;
        top: 0;
        bottom: 0;
        width: 2px;
        background: var(--gray-200);
    }

    .timeline-item {
        position: relative;
        padding-bottom: 2rem;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-marker {
        position: absolute;
        left: -1.5rem;
        top: 0.25rem;
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 2px var(--gray-300);
    }

    .timeline-item.completed .timeline-marker {
        background: #10B981;
        box-shadow: 0 0 0 2px #10B981;
    }

    .timeline-item.pending .timeline-marker {
        background: #F59E0B;
        box-shadow: 0 0 0 2px #F59E0B;
    }

    .timeline-content {
        background: white;
        border: 1.5px solid var(--gray-200);
        border-radius: 0.75rem;
        padding: 1.25rem;
        transition: all 0.2s ease;
    }

    .timeline-content:hover {
        border-color: var(--coral);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .milestone-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.75rem;
    }

    .milestone-name {
        font-weight: 700;
        color: var(--navy);
        font-size: 1rem;
        flex: 1;
    }

    .milestone-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        white-space: nowrap;
    }

    .milestone-badge.completed {
        background: rgba(16, 185, 129, 0.1);
        color: #10B981;
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .milestone-badge.pending {
        background: rgba(245, 158, 11, 0.1);
        color: #F59E0B;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .milestone-date {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: var(--gray-600);
        margin-bottom: 0.5rem;
    }

    .milestone-date i {
        color: var(--coral);
    }

    .milestone-description {
        font-size: 0.875rem;
        color: var(--gray-600);
        margin-bottom: 1rem;
    }

    .milestone-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-milestone {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .btn-milestone.complete {
        background: rgba(16, 185, 129, 0.1);
        color: #10B981;
        border: 1.5px solid rgba(16, 185, 129, 0.2);
    }

    .btn-milestone.complete:hover {
        background: rgba(16, 185, 129, 0.15);
        border-color: #10B981;
        transform: translateY(-1px);
    }

    .btn-milestone.delete {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: 1.5px solid rgba(239, 68, 68, 0.2);
    }

    .btn-milestone.delete:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: #EF4444;
        transform: translateY(-1px);
    }

    /* Documents Tab */
    .documents-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .document-card {
        background: white;
        border: 1.5px solid var(--gray-200);
        border-radius: 0.75rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .document-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        border-color: var(--coral);
    }

    .document-icon {
        padding: 2rem 1.5rem 1rem;
        text-align: center;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
    }

    .document-icon i {
        font-size: 3rem;
        color: var(--coral);
    }

    .document-content {
        padding: 1rem 1.25rem;
        text-align: center;
    }

    .document-name {
        font-weight: 700;
        color: var(--navy);
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .document-size {
        font-size: 0.75rem;
        color: var(--gray-500);
        font-weight: 600;
    }

    .document-actions {
        padding: 0.75rem 1.25rem;
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-doc {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        text-decoration: none;
    }

    .btn-doc.download {
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
        border: 1.5px solid rgba(59, 130, 246, 0.2);
    }

    .btn-doc.download:hover {
        background: rgba(59, 130, 246, 0.15);
        border-color: #3B82F6;
        transform: translateY(-1px);
    }

    .btn-doc.delete {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: 1.5px solid rgba(239, 68, 68, 0.2);
    }

    .btn-doc.delete:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: #EF4444;
        transform: translateY(-1px);
    }

    /* Empty States */
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
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 0.5rem;
    }

    .empty-state-text {
        color: var(--gray-600);
        font-size: 0.9375rem;
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 1rem;
        border: none;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        border-bottom: 2px solid var(--gray-100);
        border-radius: 1rem 1rem 0 0;
    }

    .modal-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        padding: 1.25rem 2rem;
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
        border-radius: 0 0 1rem 1rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.5rem;
        font-size: 0.9375rem;
    }

    .form-control {
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.1);
    }

    .btn-modal {
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 0.9375rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-modal.secondary {
        background: white;
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
    }

    .btn-modal.secondary:hover {
        background: var(--gray-50);
    }

    .btn-modal.primary {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }

    .btn-modal.primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .overview-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .progress-sidebar {
            padding: 1.5rem;
        }

        .progress-value {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .progress-subtitle {
            font-size: 0.8125rem;
        }
    }

    @media (max-width: 768px) {
        .project-header {
            padding: 1.5rem;
        }

        .project-header-content {
            flex-direction: column;
        }

        .project-actions {
            width: 100%;
            flex-direction: column;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
        }

        .modern-tabs {
            padding: 0 1rem;
            overflow-x: auto;
        }

        .modern-card-body {
            padding: 1.5rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .info-label {
            flex: 0 0 100px;
        }

        .documents-grid {
            grid-template-columns: 1fr;
        }

        .timeline {
            padding-left: 1.5rem;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .btn-add {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .project-header {
            padding: 1.25rem;
        }

        .project-title-section h3 {
            font-size: 1.5rem;
        }

        .modern-card-body {
            padding: 1.25rem;
        }

        .progress-sidebar {
            padding: 1.25rem;
        }

        .progress-value {
            font-size: 2.5rem;
        }

        .info-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.375rem;
            padding: 0.625rem 0;
        }

        .info-label {
            font-size: 0.75rem;
        }

        .info-value.price {
            font-size: 1rem;
        }

        .modern-tab {
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
        }

        .milestone-header {
            flex-direction: column;
            gap: 0.75rem;
        }

        .milestone-actions {
            flex-direction: column;
            width: 100%;
        }

        .milestone-actions form {
            width: 100%;
        }

        .btn-milestone {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<!-- Project Header -->
<div class="project-header">
    <div class="project-header-content">
        <div class="project-title-section">
            <h3>{{ $project->project_name }}</h3>
            <span class="project-type-badge">
                <i class="bi bi-tag-fill"></i>
                {{ $project->project_type }}
            </span>
        </div>
        <div class="project-actions">
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-modern btn-edit">
                <i class="bi bi-pencil-fill"></i>
                Edit Project
            </a>
            <a href="{{ route('admin.projects.index') }}" class="btn-modern btn-back">
                <i class="bi bi-arrow-left"></i>
                Back to List
            </a>
        </div>
    </div>
</div>

<!-- Main Card -->
<div class="modern-card">
    <!-- Tabs -->
    <div class="modern-tabs">
        <button class="modern-tab active" data-tab="overview">
            <i class="bi bi-info-circle-fill"></i>
            Overview
        </button>
        <button class="modern-tab" data-tab="milestones">
            <i class="bi bi-flag-fill"></i>
            Milestones
            <span class="tab-badge">{{ $project->milestones->count() }}</span>
        </button>
        <button class="modern-tab" data-tab="documents">
            <i class="bi bi-file-earmark-text-fill"></i>
            Documents
            <span class="tab-badge">{{ $project->documents->count() }}</span>
        </button>
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

        <!-- Overview Tab -->
        <div class="tab-content active" id="overview">
            <div class="overview-grid">
                <!-- Progress Sidebar - Will appear first on mobile -->
                <div class="progress-sidebar">
                    <h6>Project Progress</h6>
                    @php
                    $total = $project->milestones->count();
                    $completed = $project->milestones->where('status', 'completed')->count();
                    $percentage = $total > 0 ? round(($completed / $total) * 100) : 0;
                    @endphp
                    <div class="progress-value">{{ $percentage }}%</div>
                    <div class="progress-bar-custom">
                        <div class="progress-bar-fill-custom" style="width: {{ $percentage }}%"></div>
                    </div>
                    <div class="progress-subtitle">
                        <strong>{{ $completed }}</strong> of <strong>{{ $total }}</strong> milestones completed
                    </div>
                </div>

                <!-- Main Content -->
                <div class="overview-main">
                    <h5>
                        <i class="bi bi-file-text-fill"></i>
                        Description
                    </h5>
                    <p class="project-description">
                        {{ $project->description ?? 'No description provided for this project.' }}
                    </p>

                    <div class="info-grid">
                        <div class="info-table">
                            <div class="info-row">
                                <div class="info-label">Client</div>
                                <div class="info-value">{{ $project->client_name ?? '-' }}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Start Date</div>
                                <div class="info-value">
                                    {{ $project->start_date ? $project->start_date->format('d M Y') : '-' }}
                                </div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Deadline</div>
                                <div class="info-value" style="color: {{ $project->deadline && $project->deadline->isPast() ? '#EF4444' : 'inherit' }}">
                                    {{ $project->deadline ? $project->deadline->format('d M Y') : '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="info-table">
                            <div class="info-row">
                                <div class="info-label">Status</div>
                                <div class="info-value">
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
                            </div>
                            <div class="info-row">
                                <div class="info-label">Priority</div>
                                <div class="info-value">
                                    <span class="priority-badge {{ strtolower($project->priority) }}">
                                        @if(strtolower($project->priority) === 'high')
                                        <i class="bi bi-arrow-up-circle-fill"></i>
                                        @elseif(strtolower($project->priority) === 'medium')
                                        <i class="bi bi-dash-circle-fill"></i>
                                        @else
                                        <i class="bi bi-arrow-down-circle-fill"></i>
                                        @endif
                                        {{ ucfirst($project->priority) }}
                                    </span>
                                </div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Price</div>
                                <div class="info-value price">Rp {{ number_format($project->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Milestones Tab -->
        <div class="tab-content" id="milestones">
            <div class="section-header">
                <h5>
                    <i class="bi bi-flag-fill"></i>
                    Project Timeline
                </h5>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#addMilestoneModal">
                    <i class="bi bi-plus-lg"></i>
                    Add Milestone
                </button>
            </div>

            @if($project->milestones->count() > 0)
            <div class="timeline">
                @foreach($project->milestones->sortBy('due_date') as $milestone)
                <div class="timeline-item {{ $milestone->status }}">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="milestone-header">
                            <h6 class="milestone-name">{{ $milestone->milestone_name }}</h6>
                            <span class="milestone-badge {{ $milestone->status }}">
                                @if($milestone->status == 'completed')
                                <i class="bi bi-check-circle-fill"></i>
                                Completed
                                @else
                                <i class="bi bi-clock-fill"></i>
                                Pending
                                @endif
                            </span>
                        </div>
                        <div class="milestone-date">
                            <i class="bi bi-calendar-event-fill"></i>
                            Due: {{ $milestone->due_date->format('d M Y') }}
                        </div>
                        @if($milestone->description)
                        <p class="milestone-description">{{ $milestone->description }}</p>
                        @endif
                        <div class="milestone-actions">
                            @if($milestone->status != 'completed')
                            <form action="{{ route('admin.projects.milestones.update', [$project->id, $milestone->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-milestone complete">
                                    <i class="bi bi-check-lg"></i>
                                    Mark Complete
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('admin.projects.milestones.destroy', [$project->id, $milestone->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this milestone?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-milestone delete">
                                    <i class="bi bi-trash-fill"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="bi bi-flag"></i>
                </div>
                <h3 class="empty-state-title">No Milestones Yet</h3>
                <p class="empty-state-text">Add milestones to track your project progress and deadlines.</p>
            </div>
            @endif
        </div>

        <!-- Documents Tab -->
        <div class="tab-content" id="documents">
            <div class="section-header">
                <h5>
                    <i class="bi bi-file-earmark-text-fill"></i>
                    Project Files
                </h5>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
                    <i class="bi bi-upload"></i>
                    Upload File
                </button>
            </div>

            @if($project->documents->count() > 0)
            <div class="documents-grid">
                @foreach($project->documents as $doc)
                <div class="document-card">
                    <div class="document-icon">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>
                    <div class="document-content">
                        <h6 class="document-name" title="{{ $doc->document_name }}">{{ $doc->document_name }}</h6>
                        <div class="document-size">{{ $doc->file_size ?? '0 KB' }}</div>
                    </div>
                    <div class="document-actions">
                        <a href="{{ route('admin.projects.documents.download', [$project->id, $doc->id]) }}" class="btn-doc download">
                            <i class="bi bi-download"></i>
                        </a>
                        <form action="{{ route('admin.projects.documents.destroy', [$project->id, $doc->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this file?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-doc delete">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="bi bi-folder2-open"></i>
                </div>
                <h3 class="empty-state-title">No Documents Uploaded</h3>
                <p class="empty-state-text">Upload project files, contracts, or any related documents here.</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Add Milestone Modal -->
<div class="modal fade" id="addMilestoneModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-flag-fill" style="color: var(--coral); margin-right: 0.5rem;"></i>
                    Add Milestone
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.projects.milestones.store', $project->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Milestone Name <span style="color: var(--coral);">*</span></label>
                        <input type="text" name="milestone_name" class="form-control" required placeholder="e.g., Design Phase Complete">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Due Date <span style="color: var(--coral);">*</span></label>
                        <input type="date" name="due_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <span style="color: var(--gray-500); font-weight: 400;">(Optional)</span></label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Brief description of this milestone..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-modal primary">
                        <i class="bi bi-check-lg"></i>
                        Save Milestone
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Document Modal -->
<div class="modal fade" id="uploadDocModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-upload" style="color: var(--coral); margin-right: 0.5rem;"></i>
                    Upload Document
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.projects.documents.store', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Document Name <span style="color: var(--coral);">*</span></label>
                        <input type="text" name="document_name" class="form-control" required placeholder="e.g., Contract Agreement">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File <span style="color: var(--coral);">*</span></label>
                        <input type="file" name="file" class="form-control" required>
                        <small class="text-muted" style="display: flex; align-items: center; gap: 0.375rem; margin-top: 0.5rem;">
                            <i class="bi bi-info-circle-fill" style="color: var(--coral);"></i>
                            Maximum file size: 10MB
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-modal primary">
                        <i class="bi bi-upload"></i>
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching
        const tabs = document.querySelectorAll('.modern-tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');

                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));

                // Add active class to clicked tab and corresponding content
                this.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
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

        // Animate progress bar on load
        const progressBar = document.querySelector('.progress-bar-fill-custom');
        if (progressBar) {
            const targetWidth = progressBar.style.width;
            progressBar.style.width = '0%';
            setTimeout(() => {
                progressBar.style.width = targetWidth;
            }, 300);
        }
    });
</script>
@endpush