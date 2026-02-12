@extends('admin.layouts.app')

@section('title', 'Edit Project')
@section('header_title', 'Edit Project')

@push('styles')
<style>
    /* ============================================
       PROJECT EDIT FORM - CORAL THEME
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

    /* Page Container */
    .form-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Main Card */
    .modern-form-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .modern-form-header {
        padding: 2rem 2.5rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        border-bottom: 2px solid var(--gray-100);
    }

    .modern-form-header h5 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 0.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modern-form-header h5 i {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .modern-form-subtitle {
        color: var(--gray-600);
        font-size: 0.9375rem;
        margin: 0;
        padding-left: 3.25rem;
    }

    .modern-form-body {
        padding: 2.5rem;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 2.5rem;
        padding-bottom: 2.5rem;
        border-bottom: 1px solid var(--gray-100);
    }

    .form-section:last-of-type {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .form-section-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .form-section-title i {
        width: 2rem;
        height: 2rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        color: var(--coral);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    /* Form Groups */
    .modern-form-group {
        margin-bottom: 1.5rem;
    }

    .modern-form-group:last-child {
        margin-bottom: 0;
    }

    .modern-label {
        display: block;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.5rem;
        font-size: 0.9375rem;
    }

    .modern-label .required {
        color: var(--coral);
        margin-left: 0.25rem;
    }

    .label-hint {
        font-weight: 400;
        color: var(--gray-500);
        font-size: 0.875rem;
        margin-left: 0.25rem;
    }

    /* Form Controls */
    .modern-input,
    .modern-select,
    .modern-textarea {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.75rem;
        font-size: 0.9375rem;
        color: var(--gray-700);
        transition: all 0.2s ease;
        background: white;
    }

    .modern-input:focus,
    .modern-select:focus,
    .modern-textarea:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.1);
    }

    .modern-input::placeholder,
    .modern-textarea::placeholder {
        color: var(--gray-400);
    }

    .modern-input.is-invalid,
    .modern-select.is-invalid,
    .modern-textarea.is-invalid {
        border-color: #EF4444;
    }

    .modern-input.is-invalid:focus,
    .modern-select.is-invalid:focus,
    .modern-textarea.is-invalid:focus {
        border-color: #EF4444;
        box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.1);
    }

    .modern-textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* Input with Prefix */
    .input-with-prefix {
        position: relative;
    }

    .input-prefix {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-600);
        font-weight: 600;
        font-size: 0.9375rem;
        pointer-events: none;
    }

    .input-with-prefix .modern-input {
        padding-left: 3rem;
    }

    /* Currency Display */
    .currency-display {
        margin-top: 0.5rem;
        padding: 0.75rem 1rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        border-radius: 0.5rem;
        border: 1.5px solid rgba(255, 107, 107, 0.2);
        display: none;
    }

    .currency-display.active {
        display: block;
    }

    .currency-label {
        font-size: 0.75rem;
        color: var(--gray-600);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.25rem;
    }

    .currency-value {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--coral);
        font-family: 'Courier New', monospace;
    }

    /* Current Value Badge */
    .current-value-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
        border: 1.5px solid rgba(16, 185, 129, 0.2);
        border-radius: 0.5rem;
        font-size: 0.875rem;
        color: #059669;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    .current-value-badge i {
        color: #10B981;
    }

    .form-help-text {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
        font-size: 0.8125rem;
        color: var(--gray-500);
    }

    .form-help-text i {
        color: var(--coral);
        font-size: 0.875rem;
    }

    /* Error Messages */
    .invalid-feedback {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #EF4444;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .invalid-feedback:before {
        content: "⚠";
        font-size: 1rem;
    }

    /* Buttons */
    .modern-form-footer {
        padding: 1.5rem 2.5rem;
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    .btn-modern {
        padding: 0.875rem 2rem;
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
        font-size: 1.125rem;
    }

    .btn-modern-secondary {
        background: white;
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
    }

    .btn-modern-secondary:hover {
        background: var(--gray-50);
        border-color: var(--gray-400);
        color: var(--gray-900);
    }

    .btn-modern-primary {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }

    .btn-modern-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
        color: white;
    }

    .btn-modern-primary:active {
        transform: translateY(0);
    }

    /* Input Icons */
    .input-with-icon {
        position: relative;
    }

    .input-with-icon i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        font-size: 1.125rem;
        pointer-events: none;
    }

    .input-with-icon .modern-input,
    .input-with-icon .modern-select {
        padding-left: 3rem;
    }

    .input-with-icon .modern-input:focus~i,
    .input-with-icon .modern-select:focus~i {
        color: var(--coral);
    }

    /* Select Styling */
    .modern-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236B7280' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 16px;
        padding-right: 3rem;
    }

    .modern-select:focus {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FF6B6B' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    }

    /* Status/Priority Badges Preview */
    .badge-preview {
        margin-top: 0.5rem;
        padding: 0.5rem;
        border-radius: 0.5rem;
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        display: none;
    }

    .badge-preview.active {
        display: block;
    }

    .preview-label {
        font-size: 0.75rem;
        color: var(--gray-600);
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .status-badge,
    .priority-badge {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-badge.pending {
        background: rgba(245, 158, 11, 0.1);
        color: #D97706;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .status-badge.in_progress {
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

    /* Changed Indicator */
    .changed-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.25rem 0.625rem;
        background: rgba(255, 107, 107, 0.1);
        color: var(--coral);
        border-radius: 0.375rem;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: 0.5rem;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modern-form-header {
            padding: 1.5rem;
        }

        .modern-form-body {
            padding: 1.5rem;
        }

        .modern-form-footer {
            padding: 1.25rem 1.5rem;
            flex-direction: column-reverse;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
        }

        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
        }

        .modern-form-header h5 {
            font-size: 1.25rem;
        }

        .modern-form-subtitle {
            font-size: 0.875rem;
        }
    }
</style>
@endpush

@section('content')
<div class="form-container">
    <div class="modern-form-card">
        <!-- Header -->
        <div class="modern-form-header">
            <h5>
                <i class="bi bi-pencil-square"></i>
                Edit Project
            </h5>
            <p class="modern-form-subtitle">Update information for {{ $project->project_name }}</p>
        </div>

        <!-- Form Body -->
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" id="projectForm">
            @csrf
            @method('PUT')

            <div class="modern-form-body">
                <!-- Basic Information Section -->
                <div class="form-section">
                    <h6 class="form-section-title">
                        <i class="bi bi-info-circle-fill"></i>
                        Project Information
                    </h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="modern-form-group">
                                <label for="project_name" class="modern-label">
                                    Project Name<span class="required">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="modern-input @error('project_name') is-invalid @enderror"
                                    id="project_name"
                                    name="project_name"
                                    value="{{ old('project_name', $project->project_name) }}"
                                    data-original="{{ $project->project_name }}"
                                    placeholder="Enter project name"
                                    required
                                    autofocus>
                                @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="modern-form-group">
                                <label for="project_type" class="modern-label">
                                    Type<span class="required">*</span>
                                </label>
                                <div class="input-with-icon">
                                    <select
                                        class="modern-select @error('project_type') is-invalid @enderror"
                                        id="project_type"
                                        name="project_type"
                                        data-original="{{ $project->project_type }}"
                                        required>
                                        <option value="">Select Type</option>
                                        @foreach(['Web Development', 'Mobile App', 'IoT', 'Design', 'Consulting', 'Other'] as $type)
                                        <option value="{{ $type }}" {{ old('project_type', $project->project_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    <i class="bi bi-tag-fill"></i>
                                </div>
                                @error('project_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="modern-form-group">
                                <label for="priority" class="modern-label">
                                    Priority
                                    <span class="label-hint">(optional)</span>
                                </label>
                                <select
                                    class="modern-select"
                                    id="priority"
                                    name="priority"
                                    data-original="{{ $project->priority }}">
                                    @foreach(['low', 'medium', 'high'] as $p)
                                    <option value="{{ $p }}" {{ old('priority', $project->priority) == $p ? 'selected' : '' }}>{{ ucfirst($p) }}</option>
                                    @endforeach
                                </select>
                                <div class="badge-preview active" id="priorityPreview">
                                    <div class="preview-label">Current Priority:</div>
                                    <span class="priority-badge {{ $project->priority }}" id="priorityBadge">
                                        <i class="bi bi-dash-circle-fill"></i>
                                        {{ ucfirst($project->priority) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modern-form-group">
                        <label for="description" class="modern-label">
                            Description / Notes
                            <span class="label-hint">(optional)</span>
                        </label>
                        <textarea
                            class="modern-textarea @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            rows="4"
                            data-original="{{ $project->description }}"
                            placeholder="Describe the project scope, objectives, and requirements...">{{ old('description', $project->description) }}</textarea>
                        <div class="form-help-text">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Provide a detailed description to help track project goals</span>
                        </div>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Client & Timeline Section -->
                <div class="form-section">
                    <h6 class="form-section-title">
                        <i class="bi bi-calendar-event-fill"></i>
                        Client & Timeline
                    </h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="modern-form-group">
                                <label for="client_name" class="modern-label">
                                    Client Name
                                    <span class="label-hint">(optional)</span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="text"
                                        class="modern-input @error('client_name') is-invalid @enderror"
                                        id="client_name"
                                        name="client_name"
                                        value="{{ old('client_name', $project->client_name) }}"
                                        data-original="{{ $project->client_name }}"
                                        placeholder="Enter client or company name">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                @if($project->client_name)
                                <div class="current-value-badge">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Current: {{ $project->client_name }}
                                </div>
                                @endif
                                @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="modern-form-group">
                                <label for="start_date" class="modern-label">
                                    Start Date
                                    <span class="label-hint">(optional)</span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="date"
                                        class="modern-input @error('start_date') is-invalid @enderror"
                                        id="start_date"
                                        name="start_date"
                                        value="{{ old('start_date', $project->start_date ? $project->start_date->format('Y-m-d') : '') }}"
                                        data-original="{{ $project->start_date ? $project->start_date->format('Y-m-d') : '' }}">
                                    <i class="bi bi-calendar-check-fill"></i>
                                </div>
                                @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="modern-form-group">
                                <label for="deadline" class="modern-label">
                                    Deadline
                                    <span class="label-hint">(optional)</span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="date"
                                        class="modern-input @error('deadline') is-invalid @enderror"
                                        id="deadline"
                                        name="deadline"
                                        value="{{ old('deadline', $project->deadline ? $project->deadline->format('Y-m-d') : '') }}"
                                        data-original="{{ $project->deadline ? $project->deadline->format('Y-m-d') : '' }}">
                                    <i class="bi bi-calendar-x-fill"></i>
                                </div>
                                @error('deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financial & Status Section -->
                <div class="form-section">
                    <h6 class="form-section-title">
                        <i class="bi bi-cash-stack"></i>
                        Financial & Status
                    </h6>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="modern-form-group">
                                <label for="price" class="modern-label">
                                    Project Price
                                    <span class="label-hint">(IDR)</span>
                                </label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix">Rp</span>
                                    <input
                                        type="text"
                                        class="modern-input @error('price') is-invalid @enderror"
                                        id="price"
                                        name="price"
                                        value="{{ old('price', $project->price) }}"
                                        data-original="{{ $project->price }}"
                                        placeholder="0">
                                </div>
                                @if($project->price)
                                <div class="current-value-badge">
                                    <i class="bi bi-cash-coin"></i>
                                    Current: Rp {{ number_format($project->price, 0, ',', '.') }}
                                </div>
                                @endif
                                <div class="currency-display" id="currencyDisplay">
                                    <div class="currency-label">New Amount:</div>
                                    <div class="currency-value" id="currencyValue">Rp 0</div>
                                </div>
                                <div class="form-help-text">
                                    <i class="bi bi-info-circle-fill"></i>
                                    <span>Enter numbers only, formatting will be applied automatically</span>
                                </div>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="modern-form-group">
                                <label for="status" class="modern-label">
                                    Project Status
                                </label>
                                <select
                                    class="modern-select @error('status') is-invalid @enderror"
                                    id="status"
                                    name="status"
                                    data-original="{{ $project->status }}">
                                    @foreach(['pending', 'in_progress', 'completed', 'cancelled'] as $s)
                                    <option value="{{ $s }}" {{ old('status', $project->status) == $s ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $s)) }}</option>
                                    @endforeach
                                </select>
                                <div class="badge-preview active" id="statusPreview">
                                    <div class="preview-label">Current Status:</div>
                                    <span class="status-badge {{ $project->status }}" id="statusBadge">
                                        <i class="bi bi-clock-fill"></i>
                                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </div>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="modern-form-footer">
                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn-modern btn-modern-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Cancel
                </a>
                <button type="submit" class="btn-modern btn-modern-primary">
                    <i class="bi bi-check-lg"></i>
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Track form changes
        let formChanged = false;
        const form = document.getElementById('projectForm');
        const formElements = form.querySelectorAll('input, textarea, select');

        // Currency formatting for price input
        const priceInput = document.getElementById('price');
        const currencyDisplay = document.getElementById('currencyDisplay');
        const currencyValue = document.getElementById('currencyValue');
        const originalPrice = priceInput.getAttribute('data-original');
        const hiddenPriceInput = document.createElement('input');
        hiddenPriceInput.type = 'hidden';
        hiddenPriceInput.name = 'price_numeric';
        form.appendChild(hiddenPriceInput);

        function formatRupiah(angka) {
            if (!angka) return 'Rp 0';
            const number = angka.toString().replace(/[^0-9]/g, '');
            return 'Rp ' + number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function formatInputRupiah(value) {
            const number = value.replace(/[^0-9]/g, '');
            return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        if (priceInput) {
            // Format on input
            priceInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^0-9]/g, '');

                if (value) {
                    e.target.value = formatInputRupiah(value);
                    currencyValue.textContent = formatRupiah(value);
                    currencyDisplay.classList.add('active');
                    hiddenPriceInput.value = value;

                    // Check if changed from original
                    if (value !== originalPrice) {
                        formChanged = true;
                    }
                } else {
                    e.target.value = '';
                    currencyDisplay.classList.remove('active');
                    hiddenPriceInput.value = '';
                }
            });

            // Format on page load
            if (priceInput.value) {
                const value = priceInput.value.replace(/[^0-9]/g, '');
                priceInput.value = formatInputRupiah(value);
                hiddenPriceInput.value = value;
            }

            // Before submit
            form.addEventListener('submit', function() {
                const numericValue = priceInput.value.replace(/[^0-9]/g, '');
                priceInput.value = numericValue;
            });
        }

        // Status badge preview with change detection
        const statusSelect = document.getElementById('status');
        const statusBadge = document.getElementById('statusBadge');
        const originalStatus = statusSelect.getAttribute('data-original');

        const statusIcons = {
            'pending': 'bi-clock-fill',
            'in_progress': 'bi-arrow-repeat',
            'completed': 'bi-check-circle-fill',
            'cancelled': 'bi-x-circle-fill'
        };

        const statusLabels = {
            'pending': 'Pending',
            'in_progress': 'In Progress',
            'completed': 'Completed',
            'cancelled': 'Cancelled'
        };

        if (statusSelect) {
            statusSelect.addEventListener('change', function() {
                const value = this.value;
                statusBadge.className = `status-badge ${value}`;
                statusBadge.innerHTML = `<i class="bi ${statusIcons[value]}"></i>${statusLabels[value]}`;

                if (value !== originalStatus) {
                    formChanged = true;
                }
            });
        }

        // Priority badge preview with change detection
        const prioritySelect = document.getElementById('priority');
        const priorityBadge = document.getElementById('priorityBadge');
        const originalPriority = prioritySelect.getAttribute('data-original');

        const priorityIcons = {
            'high': 'bi-arrow-up-circle-fill',
            'medium': 'bi-dash-circle-fill',
            'low': 'bi-arrow-down-circle-fill'
        };

        const priorityLabels = {
            'high': 'High',
            'medium': 'Medium',
            'low': 'Low'
        };

        if (prioritySelect) {
            prioritySelect.addEventListener('change', function() {
                const value = this.value;
                priorityBadge.className = `priority-badge ${value}`;
                priorityBadge.innerHTML = `<i class="bi ${priorityIcons[value]}"></i>${priorityLabels[value]}`;

                if (value !== originalPriority) {
                    formChanged = true;
                }
            });
        }

        // Track changes on all form elements
        formElements.forEach(element => {
            const originalValue = element.getAttribute('data-original');

            element.addEventListener('change', function() {
                if (this.value !== originalValue) {
                    formChanged = true;
                }
            });

            element.addEventListener('input', function() {
                if (this.value !== originalValue) {
                    formChanged = true;
                }
            });
        });

        // Date validation
        const startDateInput = document.getElementById('start_date');
        const deadlineInput = document.getElementById('deadline');

        if (startDateInput && deadlineInput) {
            function validateDates() {
                const startDate = new Date(startDateInput.value);
                const deadline = new Date(deadlineInput.value);

                if (startDateInput.value && deadlineInput.value && deadline < startDate) {
                    deadlineInput.setCustomValidity('Deadline must be after start date');
                    deadlineInput.reportValidity();
                } else {
                    deadlineInput.setCustomValidity('');
                }
            }

            startDateInput.addEventListener('change', validateDates);
            deadlineInput.addEventListener('change', validateDates);
        }

        // Form submission
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Updating...';
                form.submitting = true;
            });
        }

        // Warn before leaving with unsaved changes
        window.addEventListener('beforeunload', function(e) {
            if (formChanged && !form.submitting) {
                e.preventDefault();
                e.returnValue = '';
            }
        });

        // Prevent Enter key submission (except textarea)
        form.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                e.preventDefault();
            }
        });
    });
</script>
@endpush