@extends('admin.layouts.app')

@section('title', 'Add Team Member')
@section('header_title', 'Add New Member')

@push('styles')
<style>
    /* ============================================
       TEAM CREATE/EDIT FORM - CORAL THEME
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
        max-width: 900px;
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
    .modern-textarea.is-invalid {
        border-color: #EF4444;
    }

    .modern-input.is-invalid:focus,
    .modern-textarea.is-invalid:focus {
        border-color: #EF4444;
        box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.1);
    }

    .modern-textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* File Upload */
    .modern-file-upload {
        position: relative;
    }

    .modern-file-input {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 1.5px dashed var(--gray-300);
        border-radius: 0.75rem;
        font-size: 0.9375rem;
        cursor: pointer;
        transition: all 0.2s ease;
        background: var(--gray-50);
    }

    .modern-file-input:hover {
        border-color: var(--coral);
        background: rgba(255, 107, 107, 0.02);
    }

    .modern-file-input:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.1);
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

    /* Photo Preview */
    .photo-preview-wrapper {
        margin-top: 1rem;
        display: none;
    }

    .photo-preview-wrapper.active {
        display: block;
    }

    .photo-preview {
        width: 150px;
        height: 150px;
        border-radius: 0.75rem;
        border: 2px solid var(--gray-200);
        overflow: hidden;
        position: relative;
    }

    .photo-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .photo-preview-remove {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        width: 2rem;
        height: 2rem;
        border-radius: 0.5rem;
        background: rgba(239, 68, 68, 0.9);
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .photo-preview-remove:hover {
        background: #EF4444;
        transform: scale(1.1);
    }

    /* Switch Toggle */
    .modern-switch-group {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        background: var(--gray-50);
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
        transition: all 0.2s ease;
    }

    .modern-switch-group:has(input:checked) {
        background: rgba(255, 107, 107, 0.05);
        border-color: var(--coral);
    }

    .modern-switch {
        position: relative;
        width: 3rem;
        height: 1.75rem;
        flex-shrink: 0;
    }

    .modern-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .switch-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gray-300);
        border-radius: 1rem;
        transition: all 0.3s ease;
    }

    .switch-slider:before {
        position: absolute;
        content: "";
        height: 1.25rem;
        width: 1.25rem;
        left: 0.25rem;
        bottom: 0.25rem;
        background: white;
        border-radius: 50%;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .modern-switch input:checked+.switch-slider {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
    }

    .modern-switch input:checked+.switch-slider:before {
        transform: translateX(1.25rem);
    }

    .switch-label {
        flex: 1;
    }

    .switch-label-title {
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .switch-label-title i {
        color: var(--coral);
    }

    .switch-label-desc {
        font-size: 0.875rem;
        color: var(--gray-500);
        margin: 0;
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

    .input-with-icon .modern-input {
        padding-left: 3rem;
    }

    .input-with-icon .modern-input:focus~i {
        color: var(--coral);
    }

    /* Number Input Styling */
    input[type="number"].modern-input {
        -moz-appearance: textfield;
    }

    input[type="number"].modern-input::-webkit-inner-spin-button,
    input[type="number"].modern-input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
                <i class="bi bi-person-plus-fill"></i>
                Add New Team Member
            </h5>
            <p class="modern-form-subtitle">Fill in the information below to add a new member to your team</p>
        </div>

        <!-- Form Body -->
        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modern-form-body">
                <!-- Basic Information Section -->
                <div class="form-section">
                    <h6 class="form-section-title">
                        <i class="bi bi-info-circle-fill"></i>
                        Basic Information
                    </h6>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="modern-form-group">
                                <label for="name" class="modern-label">
                                    Full Name<span class="required">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="modern-input @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Enter full name"
                                    required
                                    autofocus>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="modern-form-group">
                                <label for="order" class="modern-label">
                                    Display Order
                                    <span class="label-hint">(optional)</span>
                                </label>
                                <input
                                    type="number"
                                    class="modern-input"
                                    id="order"
                                    name="order"
                                    value="{{ old('order', 0) }}"
                                    placeholder="0"
                                    min="0">
                                <div class="form-help-text">
                                    <i class="bi bi-info-circle-fill"></i>
                                    <span>Lower numbers appear first</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modern-form-group">
                        <label for="position" class="modern-label">
                            Position / Role<span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            class="modern-input @error('position') is-invalid @enderror"
                            id="position"
                            name="position"
                            value="{{ old('position') }}"
                            placeholder="e.g., CEO, Lead Developer, Product Manager"
                            required>
                        @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modern-form-group">
                        <label for="bio" class="modern-label">
                            Short Bio
                            <span class="label-hint">(optional)</span>
                        </label>
                        <textarea
                            class="modern-textarea @error('bio') is-invalid @enderror"
                            id="bio"
                            name="bio"
                            rows="4"
                            placeholder="Write a brief description about this team member...">{{ old('bio') }}</textarea>
                        <div class="form-help-text">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>A short professional description (2-3 sentences recommended)</span>
                        </div>
                        @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Profile Photo Section -->
                <div class="form-section">
                    <h6 class="form-section-title">
                        <i class="bi bi-image-fill"></i>
                        Profile Photo
                    </h6>

                    <div class="modern-form-group">
                        <label for="photo" class="modern-label">
                            Upload Photo
                            <span class="label-hint">(optional)</span>
                        </label>
                        <input
                            type="file"
                            class="modern-file-input @error('photo') is-invalid @enderror"
                            id="photo"
                            name="photo"
                            accept="image/jpeg,image/png,image/jpg,image/webp">
                        <div class="form-help-text">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Recommended: Square image (1:1 ratio), max 2MB. Formats: JPG, PNG, WebP</span>
                        </div>
                        @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Photo Preview -->
                        <div class="photo-preview-wrapper" id="photoPreviewWrapper">
                            <div class="photo-preview">
                                <img id="photoPreview" src="" alt="Preview">
                                <button type="button" class="photo-preview-remove" id="removePhoto">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links Section -->
                <div class="form-section">
                    <h6 class="form-section-title">
                        <i class="bi bi-share-fill"></i>
                        Social Links
                    </h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="modern-form-group">
                                <label for="linkedin" class="modern-label">
                                    LinkedIn Profile
                                    <span class="label-hint">(optional)</span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        class="modern-input @error('linkedin') is-invalid @enderror"
                                        id="linkedin"
                                        name="linkedin"
                                        value="{{ old('linkedin') }}"
                                        placeholder="https://linkedin.com/in/username">
                                    <i class="bi bi-linkedin"></i>
                                </div>
                                @error('linkedin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="modern-form-group">
                                <label for="github" class="modern-label">
                                    GitHub Profile
                                    <span class="label-hint">(optional)</span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        class="modern-input @error('github') is-invalid @enderror"
                                        id="github"
                                        name="github"
                                        value="{{ old('github') }}"
                                        placeholder="https://github.com/username">
                                    <i class="bi bi-github"></i>
                                </div>
                                @error('github')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Section -->
                <div class="form-section">
                    <h6 class="form-section-title">
                        <i class="bi bi-gear-fill"></i>
                        Status & Visibility
                    </h6>

                    <div class="modern-switch-group">
                        <label class="modern-switch">
                            <input
                                type="checkbox"
                                id="is_active"
                                name="is_active"
                                value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                        <div class="switch-label">
                            <div class="switch-label-title">
                                <i class="bi bi-eye-fill"></i>
                                Active Member
                            </div>
                            <p class="switch-label-desc">
                                This member will be displayed on the public About/Team page
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="modern-form-footer">
                <a href="{{ route('admin.team.index') }}" class="btn-modern btn-modern-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Cancel
                </a>
                <button type="submit" class="btn-modern btn-modern-primary">
                    <i class="bi bi-check-lg"></i>
                    Save Member
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Photo Preview
        const photoInput = document.getElementById('photo');
        const photoPreview = document.getElementById('photoPreview');
        const photoPreviewWrapper = document.getElementById('photoPreviewWrapper');
        const removePhotoBtn = document.getElementById('removePhoto');

        if (photoInput) {
            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreview.src = e.target.result;
                        photoPreviewWrapper.classList.add('active');
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        if (removePhotoBtn) {
            removePhotoBtn.addEventListener('click', function() {
                photoInput.value = '';
                photoPreview.src = '';
                photoPreviewWrapper.classList.remove('active');
            });
        }

        // Form validation enhancement
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Saving...';
            });
        }

        // Auto-format URLs
        const urlInputs = document.querySelectorAll('input[type="url"]');
        urlInputs.forEach(input => {
            input.addEventListener('blur', function() {
                let value = this.value.trim();
                if (value && !value.match(/^https?:\/\//i)) {
                    this.value = 'https://' + value;
                }
            });
        });
    });
</script>
@endpush