@extends('admin.layouts.app')

@section('title', 'Create Page')
@section('header_title', 'Create New Page')

@push('styles')
<style>
    /* ============================================
       CREATE PAGE STYLES - CORAL THEME
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
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        border-bottom: 2px solid var(--gray-100);
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

    /* Form Styles */
    .form-section {
        margin-bottom: 2rem;
    }

    .form-section-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--gray-100);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-section-title i {
        color: var(--coral);
        font-size: 1.125rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .form-label .required {
        color: var(--coral);
        margin-left: 0.25rem;
    }

    .form-control,
    .form-select {
        border-radius: 0.5rem;
        border: 1.5px solid var(--gray-300);
        padding: 0.625rem 0.875rem;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    .form-control.is-invalid {
        border-color: #DC2626;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(220, 38, 38, 0.15);
    }

    .invalid-feedback {
        color: #DC2626;
        font-size: 0.8125rem;
        margin-top: 0.375rem;
        font-weight: 500;
    }

    /* Helper Text */
    .form-text {
        color: var(--gray-500);
        font-size: 0.8125rem;
        margin-top: 0.375rem;
        display: flex;
        align-items: start;
        gap: 0.375rem;
    }

    .form-text i {
        color: var(--coral);
        margin-top: 0.125rem;
        font-size: 0.75rem;
    }

    /* Select Styling */
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23FF6B6B' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
    }

    .form-select option[disabled] {
        color: var(--gray-400);
    }

    /* Switch Toggle */
    .form-switch {
        padding-left: 2.5rem;
    }

    .form-switch .form-check-input {
        width: 3rem;
        height: 1.5rem;
        border-radius: 1.5rem;
        border: 2px solid var(--gray-300);
        background-color: var(--gray-200);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-switch .form-check-input:checked {
        background-color: var(--coral);
        border-color: var(--coral);
    }

    .form-switch .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    .form-switch .form-check-label {
        font-weight: 600;
        color: var(--gray-700);
        cursor: pointer;
        user-select: none;
    }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.08), rgba(255, 107, 107, 0.03));
        border-left: 4px solid var(--coral);
        border-radius: 0.5rem;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
    }

    .info-box-title {
        font-weight: 700;
        color: var(--coral);
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-box-title i {
        font-size: 1rem;
    }

    .info-box-text {
        color: var(--gray-700);
        font-size: 0.8125rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Buttons */
    .btn-primary-custom {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        font-weight: 600;
        padding: 0.625rem 2rem;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
        color: white;
    }

    .btn-primary-custom i {
        font-size: 1rem;
    }

    .btn-secondary-custom {
        background: var(--gray-100);
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
        font-weight: 600;
        padding: 0.625rem 2rem;
        border-radius: 0.75rem;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-secondary-custom:hover {
        background: var(--gray-200);
        border-color: var(--gray-400);
        color: var(--gray-800);
    }

    .btn-secondary-custom i {
        font-size: 1rem;
    }

    /* Form Actions */
    .form-actions {
        padding-top: 2rem;
        border-top: 2px solid var(--gray-100);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    /* TinyMCE Container */
    .tinymce-wrapper {
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        overflow: hidden;
        transition: border-color 0.2s ease;
    }

    .tinymce-wrapper:focus-within {
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    /* Character Counter */
    .char-counter {
        font-size: 0.75rem;
        color: var(--gray-500);
        margin-top: 0.375rem;
        text-align: right;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modern-card-header {
            padding: 1.25rem 1.5rem;
        }

        .modern-card-body {
            padding: 1.5rem;
        }

        .modern-card-header h5 {
            font-size: 1.125rem;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions button,
        .form-actions a {
            width: 100%;
            justify-content: center;
        }

        .btn-primary-custom,
        .btn-secondary-custom {
            padding: 0.75rem 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9">
        <!-- Info Box -->
        <div class="info-box">
            <div class="info-box-title">
                <i class="bi bi-info-circle-fill"></i>
                Creating a New Page
            </div>
            <p class="info-box-text">
                Static pages are used for important content like About Us, Privacy Policy, or Terms of Service.
                Choose the appropriate page position, write your content, and configure SEO settings for better visibility.
            </p>
        </div>

        <!-- Main Card -->
        <div class="modern-card">
            <div class="modern-card-header">
                <h5>
                    <i class="bi bi-file-earmark-plus"></i>
                    New Page Form
                </h5>
            </div>

            <div class="modern-card-body">
                <form action="{{ route('admin.pages.store') }}" method="POST">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="bi bi-pencil-square"></i>
                            Basic Information
                        </div>

                        <!-- Title Field -->
                        <div class="mb-4">
                            <label for="title" class="form-label">
                                Page Title
                                <span class="required">*</span>
                            </label>
                            <input type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="e.g., About Our Company"
                                required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-lightbulb-fill"></i>
                                <span>This will be displayed as the main heading of the page</span>
                            </div>
                        </div>

                        <!-- Slug/Position Field -->
                        <div class="mb-4">
                            <label for="slug" class="form-label">
                                Page Position (URL Slug)
                                <span class="required">*</span>
                            </label>
                            <select class="form-select @error('slug') is-invalid @enderror"
                                id="slug"
                                name="slug"
                                required>
                                <option value="" selected disabled>-- Select Page Position --</option>
                                <option value="about" {{ old('slug') == 'about' ? 'selected' : '' }}>
                                    About Us (Tentang Kami)
                                </option>
                                <option value="privacy" {{ old('slug') == 'privacy' ? 'selected' : '' }}>
                                    Privacy Policy
                                </option>
                                <option value="terms" {{ old('slug') == 'terms' ? 'selected' : '' }}>
                                    Terms of Service
                                </option>
                            </select>
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-link-45deg"></i>
                                <span>Choose where this page will be displayed. The URL will be automatically generated.</span>
                            </div>
                        </div>

                        <!-- Content Field -->
                        <div class="mb-4">
                            <label for="content" class="form-label">
                                Page Content
                                <span class="required">*</span>
                            </label>
                            <div class="tinymce-wrapper">
                                <textarea class="form-control"
                                    id="content"
                                    name="content"
                                    rows="15">{{ old('content') }}</textarea>
                            </div>
                            @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-type"></i>
                                <span>Use the rich text editor to format your content with headings, lists, images, and more</span>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Settings Section -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="bi bi-search"></i>
                            SEO Settings (Optional)
                        </div>

                        <!-- Meta Title -->
                        <div class="mb-4">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text"
                                class="form-control"
                                id="meta_title"
                                name="meta_title"
                                value="{{ old('meta_title') }}"
                                maxlength="60"
                                placeholder="SEO-friendly title for search engines">
                            <div class="char-counter">
                                <span id="meta-title-count">0</span> / 60 characters
                            </div>
                            <div class="form-text">
                                <i class="bi bi-google"></i>
                                <span>This title appears in search engine results. Keep it under 60 characters for best results.</span>
                            </div>
                        </div>

                        <!-- Meta Description -->
                        <div class="mb-4">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control"
                                id="meta_description"
                                name="meta_description"
                                rows="3"
                                maxlength="160"
                                placeholder="Brief description of the page for search engines">{{ old('meta_description') }}</textarea>
                            <div class="char-counter">
                                <span id="meta-desc-count">0</span> / 160 characters
                            </div>
                            <div class="form-text">
                                <i class="bi bi-card-text"></i>
                                <span>This description appears below the title in search results. Aim for 150-160 characters.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Publishing Settings -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="bi bi-gear-fill"></i>
                            Publishing Settings
                        </div>

                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input"
                                type="checkbox"
                                id="is_active"
                                name="is_active"
                                value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Publish Page Immediately
                            </label>
                        </div>
                        <div class="form-text">
                            <i class="bi bi-eye-fill"></i>
                            <span>When enabled, this page will be visible to website visitors right away.</span>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.pages.index') }}" class="btn-secondary-custom">
                            <i class="bi bi-arrow-left"></i>
                            Back to List
                        </a>
                        <button type="submit" class="btn-primary-custom">
                            <i class="bi bi-check-circle-fill"></i>
                            Create Page
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: '#content',
        height: 500,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | ' +
            'forecolor backcolor | removeformat | help',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }',
        branding: false,
        promotion: false
    });

    // Character counter for Meta Title
    const metaTitleInput = document.getElementById('meta_title');
    const metaTitleCount = document.getElementById('meta-title-count');

    if (metaTitleInput) {
        metaTitleInput.addEventListener('input', function() {
            metaTitleCount.textContent = this.value.length;
            if (this.value.length > 55) {
                metaTitleCount.style.color = '#F59E0B';
            } else {
                metaTitleCount.style.color = '';
            }
        });
        // Initial count
        metaTitleCount.textContent = metaTitleInput.value.length;
    }

    // Character counter for Meta Description
    const metaDescInput = document.getElementById('meta_description');
    const metaDescCount = document.getElementById('meta-desc-count');

    if (metaDescInput) {
        metaDescInput.addEventListener('input', function() {
            metaDescCount.textContent = this.value.length;
            if (this.value.length > 150) {
                metaDescCount.style.color = '#F59E0B';
            } else {
                metaDescCount.style.color = '';
            }
        });
        // Initial count
        metaDescCount.textContent = metaDescInput.value.length;
    }

    // Auto-focus first input
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('title').focus();
    });
</script>

@endsection