@extends('admin.layouts.app')

@section('title', 'Edit Post')
@section('header_title', 'Edit Blog Post')

@push('styles')
<style>
    /* ============================================
       BLOG EDIT STYLES - CORAL THEME
    ============================================ */

    /* Main Card */
    .modern-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
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

    .post-title-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        border-radius: 0.5rem;
        font-size: 0.9375rem;
        margin-left: auto;
        color: var(--coral);
        font-weight: 600;
    }

    .modern-card-body {
        padding: 2rem;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9375rem;
    }

    .form-label i {
        color: var(--coral);
        font-size: 1rem;
    }

    .form-label .required {
        color: #EF4444;
        font-weight: 700;
    }

    /* Form Controls */
    .form-control-modern {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.75rem;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        background: white;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    .form-control-modern.is-invalid {
        border-color: #EF4444;
    }

    .form-control-modern.is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.15);
    }

    textarea.form-control-modern {
        resize: vertical;
        min-height: 100px;
    }

    /* Form Text */
    .form-text-modern {
        font-size: 0.8125rem;
        color: var(--gray-600);
        margin-top: 0.375rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .form-text-modern i {
        font-size: 0.875rem;
        color: var(--coral);
    }

    /* Invalid Feedback */
    .invalid-feedback {
        display: block;
        margin-top: 0.375rem;
        font-size: 0.8125rem;
        color: #EF4444;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .invalid-feedback i {
        font-size: 0.875rem;
    }

    /* Image Upload & Preview */
    .file-upload-wrapper {
        position: relative;
    }

    .current-image-preview {
        margin-top: 1rem;
        padding: 1rem;
        background: var(--gray-50);
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
    }

    .current-image-preview-label {
        font-size: 0.8125rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .current-image-preview-label i {
        color: var(--coral);
    }

    .image-preview-container {
        position: relative;
        border-radius: 0.75rem;
        overflow: hidden;
        border: 2px solid var(--gray-300);
    }

    .image-preview-container img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        display: block;
    }

    .image-preview-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.375rem 0.75rem;
        background: rgba(255, 107, 107, 0.95);
        color: white;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
        backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .new-image-preview {
        margin-top: 1rem;
        border-radius: 0.75rem;
        overflow: hidden;
        border: 2px dashed var(--coral);
        background: rgba(255, 107, 107, 0.02);
        display: none;
    }

    .new-image-preview.active {
        display: block;
    }

    .new-image-preview img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
    }

    .new-image-label {
        padding: 0.75rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        text-align: center;
        font-size: 0.8125rem;
        font-weight: 600;
        color: var(--coral);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    /* Tag Input System */
    .tag-input-wrapper {
        position: relative;
    }

    .tag-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        padding: 0.75rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.75rem;
        min-height: 3rem;
        cursor: text;
        transition: all 0.2s ease;
        background: white;
    }

    .tag-container:focus-within {
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    .tag-item {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.2s ease;
        animation: tagSlideIn 0.2s ease;
    }

    @keyframes tagSlideIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .tag-item i {
        font-size: 0.75rem;
        cursor: pointer;
        opacity: 0.8;
        transition: opacity 0.2s;
    }

    .tag-item i:hover {
        opacity: 1;
    }

    .tag-input {
        flex: 1;
        min-width: 150px;
        border: none;
        outline: none;
        padding: 0.375rem;
        font-size: 0.9375rem;
    }

    .tag-suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        margin-top: 0.5rem;
        background: white;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.75rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
    }

    .tag-suggestions.active {
        display: block;
    }

    .tag-suggestion-item {
        padding: 0.75rem 1rem;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border-bottom: 1px solid var(--gray-100);
    }

    .tag-suggestion-item:last-child {
        border-bottom: none;
    }

    .tag-suggestion-item:hover {
        background: rgba(255, 107, 107, 0.05);
        color: var(--coral);
    }

    .tag-suggestion-item i {
        font-size: 0.875rem;
        color: var(--coral);
    }

    /* Category Selector Pills */
    .category-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-top: 0.5rem;
    }

    .category-pill {
        position: relative;
    }

    .category-pill input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .category-pill-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1rem;
        border: 2px solid var(--gray-300);
        border-radius: 2rem;
        cursor: pointer;
        transition: all 0.2s ease;
        background: white;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--gray-700);
    }

    .category-pill input[type="radio"]:checked+.category-pill-label {
        border-color: var(--coral);
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
    }

    .category-pill-label:hover {
        border-color: var(--coral);
        transform: translateY(-2px);
    }

    .category-pill-label i {
        font-size: 1rem;
    }

    /* Custom Category Input */
    .custom-category-wrapper {
        margin-top: 0.75rem;
        display: none;
    }

    .custom-category-wrapper.active {
        display: block;
    }

    /* Switch Toggle */
    .switch-wrapper {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: var(--gray-50);
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
        transition: all 0.2s ease;
    }

    .switch-wrapper:hover {
        border-color: var(--coral);
        background: rgba(255, 107, 107, 0.02);
    }

    .switch-toggle {
        position: relative;
        width: 3rem;
        height: 1.5rem;
        flex-shrink: 0;
    }

    .switch-toggle input {
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
        background-color: var(--gray-300);
        transition: 0.3s;
        border-radius: 1.5rem;
    }

    .switch-slider:before {
        position: absolute;
        content: "";
        height: 1.125rem;
        width: 1.125rem;
        left: 0.1875rem;
        bottom: 0.1875rem;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }

    .switch-toggle input:checked+.switch-slider {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
    }

    .switch-toggle input:checked+.switch-slider:before {
        transform: translateX(1.5rem);
    }

    .switch-label {
        flex: 1;
    }

    .switch-label-title {
        font-weight: 600;
        color: var(--navy);
        font-size: 0.9375rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .switch-label-title i {
        color: var(--coral);
    }

    .switch-label-desc {
        font-size: 0.8125rem;
        color: var(--gray-600);
        margin-top: 0.125rem;
    }

    .publish-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.25rem 0.625rem;
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        border-radius: 0.375rem;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Buttons */
    .btn-primary-custom {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        font-weight: 600;
        padding: 0.875rem 2rem;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
        color: white;
    }

    .btn-secondary-custom {
        background: white;
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
        font-weight: 600;
        padding: 0.875rem 2rem;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-secondary-custom:hover {
        border-color: var(--coral);
        color: var(--coral);
        transform: translateY(-2px);
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 2rem;
        margin-top: 2rem;
        border-top: 2px solid var(--gray-100);
        gap: 1rem;
    }

    /* Section Divider */
    .section-divider {
        margin: 2rem 0;
        border: none;
        border-top: 2px solid var(--gray-100);
    }

    .section-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--coral);
        font-size: 1.125rem;
    }

    /* Alert Box */
    .alert-info-custom {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.05));
        border-left: 4px solid #3B82F6;
        border-radius: 0.75rem;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-info-custom i {
        font-size: 1.25rem;
        color: #3B82F6;
    }

    .alert-info-custom-text {
        flex: 1;
        color: #1E40AF;
        font-size: 0.9375rem;
    }

    /* TinyMCE Wrapper */
    .editor-wrapper {
        border: 1.5px solid var(--gray-300);
        border-radius: 0.75rem;
        overflow: hidden;
        transition: all 0.2s ease;
    }

    .editor-wrapper:focus-within {
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    /* Character Counter */
    .char-counter {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 0.5rem;
        font-size: 0.8125rem;
        color: var(--gray-600);
    }

    .char-counter-current {
        font-weight: 600;
        color: var(--coral);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modern-card-body {
            padding: 1.5rem;
        }

        .category-pills {
            flex-direction: column;
        }

        .category-pill-label {
            width: 100%;
            justify-content: center;
        }

        .form-actions {
            flex-direction: column-reverse;
            gap: 1rem;
        }

        .btn-primary-custom,
        .btn-secondary-custom {
            width: 100%;
            justify-content: center;
        }

        .post-title-badge {
            margin-left: 0;
            margin-top: 0.5rem;
        }

        .modern-card-header h5 {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5>
                    <i class="bi bi-pencil-square"></i>
                    Edit Blog Post
                    <span class="post-title-badge">
                        <i class="bi bi-file-text-fill"></i>
                        {{ $blog->title }}
                    </span>
                </h5>
            </div>

            <div class="modern-card-body">
                <!-- Info Alert -->
                <div class="alert-info-custom">
                    <i class="bi bi-info-circle-fill"></i>
                    <div class="alert-info-custom-text">
                        <strong>Editing Mode:</strong> Update your blog post below. Leave featured image field empty to keep the current image.
                    </div>
                </div>

                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="blogForm">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="section-title">
                        <i class="bi bi-info-circle-fill"></i>
                        Basic Information
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">
                            <i class="bi bi-file-text-fill"></i>
                            Post Title
                            <span class="required">*</span>
                        </label>
                        <input type="text"
                            class="form-control-modern @error('title') is-invalid @enderror"
                            id="title"
                            name="title"
                            value="{{ old('title', $blog->title) }}"
                            placeholder="e.g. Getting Started with Laravel 11"
                            required>
                        @error('title')
                        <div class="invalid-feedback">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="char-counter">
                            <span>
                                <i class="bi bi-info-circle-fill"></i>
                                Recommended: 40-60 characters
                            </span>
                            <span>
                                <span class="char-counter-current" id="titleCounter">{{ strlen($blog->title) }}</span> / 100
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">
                                <i class="bi bi-folder-fill"></i>
                                Category
                                <span class="required">*</span>
                            </label>
                            <div class="category-pills">
                                <div class="category-pill">
                                    <input type="radio" id="cat_tech" name="category" value="Technology" {{ old('category', $blog->category) == 'Technology' ? 'checked' : '' }}>
                                    <label for="cat_tech" class="category-pill-label">
                                        <i class="bi bi-cpu-fill"></i>
                                        Technology
                                    </label>
                                </div>

                                <div class="category-pill">
                                    <input type="radio" id="cat_design" name="category" value="Design" {{ old('category', $blog->category) == 'Design' ? 'checked' : '' }}>
                                    <label for="cat_design" class="category-pill-label">
                                        <i class="bi bi-palette-fill"></i>
                                        Design
                                    </label>
                                </div>

                                <div class="category-pill">
                                    <input type="radio" id="cat_business" name="category" value="Business" {{ old('category', $blog->category) == 'Business' ? 'checked' : '' }}>
                                    <label for="cat_business" class="category-pill-label">
                                        <i class="bi bi-briefcase-fill"></i>
                                        Business
                                    </label>
                                </div>

                                <div class="category-pill">
                                    <input type="radio" id="cat_tutorial" name="category" value="Tutorial" {{ old('category', $blog->category) == 'Tutorial' ? 'checked' : '' }}>
                                    <label for="cat_tutorial" class="category-pill-label">
                                        <i class="bi bi-book-fill"></i>
                                        Tutorial
                                    </label>
                                </div>

                                <div class="category-pill">
                                    <input type="radio" id="cat_custom" name="category_type" value="custom">
                                    <label for="cat_custom" class="category-pill-label">
                                        <i class="bi bi-plus-circle-fill"></i>
                                        Custom
                                    </label>
                                </div>
                            </div>

                            <div class="custom-category-wrapper" id="customCategoryWrapper">
                                <input type="text"
                                    class="form-control-modern"
                                    id="custom_category"
                                    placeholder="Enter custom category"
                                    value="{{ old('category', $blog->category) }}">
                            </div>

                            @error('category')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="tags" class="form-label">
                                <i class="bi bi-tags-fill"></i>
                                Tags
                            </label>
                            <div class="tag-input-wrapper">
                                <div class="tag-container" id="tagContainer" onclick="focusTagInput()">
                                    <input type="text"
                                        class="tag-input"
                                        id="tagInput"
                                        placeholder="Type and press Enter..."
                                        autocomplete="off">
                                </div>
                                <div class="tag-suggestions" id="tagSuggestions"></div>
                                <input type="hidden" name="tags" id="tagsHidden" value="{{ old('tags', $blog->tags) }}">
                            </div>
                            <small class="form-text-modern">
                                <i class="bi bi-info-circle-fill"></i>
                                Press Enter to add tags. Example: Laravel, PHP, Tutorial
                            </small>
                        </div>
                    </div>

                    <hr class="section-divider">

                    <!-- Media Section -->
                    <div class="section-title">
                        <i class="bi bi-image-fill"></i>
                        Featured Image
                    </div>

                    <div class="form-group">
                        <label for="featured_image" class="form-label">
                            <i class="bi bi-card-image"></i>
                            Update Featured Image
                        </label>

                        <!-- Current Image Preview -->
                        @if($blog->featured_image)
                        <div class="current-image-preview">
                            <div class="current-image-preview-label">
                                <i class="bi bi-image-fill"></i>
                                Current Featured Image
                            </div>
                            <div class="image-preview-container">
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                                <div class="image-preview-badge">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Active
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- File Input -->
                        <div class="file-upload-wrapper">
                            <input type="file"
                                class="form-control-modern @error('featured_image') is-invalid @enderror"
                                id="featured_image"
                                name="featured_image"
                                accept="image/*"
                                onchange="previewNewImage(event)">
                            @error('featured_image')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                            @enderror
                            <small class="form-text-modern">
                                <i class="bi bi-info-circle-fill"></i>
                                Leave empty to keep current image. Recommended: 1200x630px, Max: 2MB
                            </small>

                            <!-- New Image Preview -->
                            <div class="new-image-preview" id="newImagePreview">
                                <div class="new-image-label">
                                    <i class="bi bi-stars"></i>
                                    New Image Preview
                                </div>
                                <img id="newImageTag" src="" alt="New Preview">
                            </div>
                        </div>
                    </div>

                    <hr class="section-divider">

                    <!-- Content Section -->
                    <div class="section-title">
                        <i class="bi bi-text-paragraph"></i>
                        Post Content
                    </div>

                    <div class="form-group">
                        <label for="excerpt" class="form-label">
                            <i class="bi bi-text-left"></i>
                            Excerpt (Short Summary)
                        </label>
                        <textarea class="form-control-modern @error('excerpt') is-invalid @enderror"
                            id="excerpt"
                            name="excerpt"
                            rows="3"
                            placeholder="Write a compelling summary of your post (shown in blog list)..."
                            maxlength="300">{{ old('excerpt', $blog->excerpt) }}</textarea>
                        @error('excerpt')
                        <div class="invalid-feedback">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="char-counter">
                            <span>
                                <i class="bi bi-info-circle-fill"></i>
                                Recommended: 120-160 characters
                            </span>
                            <span>
                                <span class="char-counter-current" id="excerptCounter">{{ strlen($blog->excerpt ?? '') }}</span> / 300
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="form-label">
                            <i class="bi bi-file-earmark-text-fill"></i>
                            Full Content
                            <span class="required">*</span>
                        </label>
                        <div class="editor-wrapper">
                            <textarea id="content" name="content">{{ old('content', $blog->content) }}</textarea>
                        </div>
                        @error('content')
                        <div class="invalid-feedback d-block">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <hr class="section-divider">

                    <!-- Publishing Settings -->
                    <div class="section-title">
                        <i class="bi bi-gear-fill"></i>
                        Publishing Settings
                    </div>

                    <div class="form-group">
                        <div class="switch-wrapper">
                            <label class="switch-toggle">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" id="is_published" name="is_published" value="1" {{ $blog->is_published ? 'checked' : '' }}>
                                <span class="switch-slider"></span>
                            </label>
                            <div class="switch-label">
                                <div class="switch-label-title">
                                    <i class="bi bi-send-fill"></i>
                                    Published Status
                                    <span class="publish-badge">
                                        <i class="bi bi-check-circle-fill"></i>
                                        LIVE
                                    </span>
                                </div>
                                <div class="switch-label-desc">Make this post visible to public</div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.blog.index') }}" class="btn-secondary-custom">
                            <i class="bi bi-arrow-left"></i>
                            Back to List
                        </a>
                        <button type="submit" class="btn-primary-custom">
                            <i class="bi bi-check-circle-fill"></i>
                            Update Post
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
    // ============================================
    // TINYMCE INITIALIZATION
    // ============================================
    tinymce.init({
        selector: '#content',
        height: 500,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | image link | code | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; line-height: 1.6; }',
        branding: false,
        promotion: false,
        image_caption: true,
        image_advtab: true,
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_url: '/upload-image', // Adjust this to your upload endpoint
    });

    // ============================================
    // NEW IMAGE PREVIEW
    // ============================================
    function previewNewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('newImagePreview');
        const imgTag = document.getElementById('newImageTag');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgTag.src = e.target.result;
                preview.classList.add('active');
            };
            reader.readAsDataURL(file);
        }
    }

    // ============================================
    // TAG INPUT SYSTEM
    // ============================================
    const tagContainer = document.getElementById('tagContainer');
    const tagInput = document.getElementById('tagInput');
    const tagSuggestions = document.getElementById('tagSuggestions');
    const tagsHidden = document.getElementById('tagsHidden');
    let tags = [];

    // Common blog tags
    const commonTags = [
        'Laravel', 'PHP', 'JavaScript', 'Vue.js', 'React',
        'Tutorial', 'Web Development', 'Programming', 'Database',
        'MySQL', 'API', 'Frontend', 'Backend', 'Full Stack',
        'UI/UX', 'Design', 'Business', 'Marketing', 'SEO',
        'Mobile', 'Tips & Tricks', 'Best Practices', 'Guide'
    ];

    // Load existing tags from database
    if (tagsHidden.value) {
        tags = tagsHidden.value.split(',').map(tag => tag.trim()).filter(tag => tag);
        renderTags();
    }

    function focusTagInput() {
        tagInput.focus();
    }

    function addTag(tagText) {
        const trimmedTag = tagText.trim();

        if (trimmedTag && !tags.includes(trimmedTag)) {
            tags.push(trimmedTag);
            renderTags();
            updateHiddenInput();
            tagInput.value = '';
            hideSuggestions();
        }
    }

    function removeTag(index) {
        tags.splice(index, 1);
        renderTags();
        updateHiddenInput();
    }

    function renderTags() {
        const existingTags = tagContainer.querySelectorAll('.tag-item');
        existingTags.forEach(tag => tag.remove());

        tags.forEach((tag, index) => {
            const tagElement = document.createElement('div');
            tagElement.className = 'tag-item';
            tagElement.innerHTML = `
            ${tag}
            <i class="bi bi-x-lg" onclick="removeTag(${index})"></i>
        `;
            tagContainer.insertBefore(tagElement, tagInput);
        });
    }

    function updateHiddenInput() {
        tagsHidden.value = tags.join(', ');
    }

    function showSuggestions(query) {
        const filtered = commonTags.filter(tag =>
            tag.toLowerCase().includes(query.toLowerCase()) && !tags.includes(tag)
        );

        if (filtered.length > 0) {
            tagSuggestions.innerHTML = filtered.slice(0, 5).map(tag => `
            <div class="tag-suggestion-item" onclick="addTag('${tag}')">
                <i class="bi bi-plus-circle-fill"></i>
                ${tag}
            </div>
        `).join('');
            tagSuggestions.classList.add('active');
        } else {
            hideSuggestions();
        }
    }

    function hideSuggestions() {
        tagSuggestions.classList.remove('active');
    }

    tagInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addTag(tagInput.value);
        } else if (e.key === 'Backspace' && tagInput.value === '' && tags.length > 0) {
            removeTag(tags.length - 1);
        }
    });

    tagInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        if (query.length > 0) {
            showSuggestions(query);
        } else {
            hideSuggestions();
        }
    });

    document.addEventListener('click', function(e) {
        if (!tagContainer.contains(e.target) && !tagSuggestions.contains(e.target)) {
            hideSuggestions();
        }
    });

    // ============================================
    // CATEGORY CUSTOM TOGGLE
    // ============================================
    const customCategoryRadio = document.getElementById('cat_custom');
    const customCategoryWrapper = document.getElementById('customCategoryWrapper');
    const customCategoryInput = document.getElementById('custom_category');
    const categoryRadios = document.querySelectorAll('input[name="category"]');

    // Check if current category is not in predefined list
    const currentCategory = "{{ old('category', $blog->category) }}";
    const predefinedCategories = ['Technology', 'Design', 'Business', 'Tutorial'];

    if (currentCategory && !predefinedCategories.includes(currentCategory)) {
        customCategoryRadio.checked = true;
        customCategoryWrapper.classList.add('active');
    }

    customCategoryRadio.addEventListener('change', function() {
        if (this.checked) {
            customCategoryWrapper.classList.add('active');
            customCategoryInput.focus();
        }
    });

    categoryRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this !== customCategoryRadio) {
                customCategoryWrapper.classList.remove('active');
                customCategoryInput.value = '';
            }
        });
    });

    // Sync custom category to form on submit
    document.getElementById('blogForm').addEventListener('submit', function(e) {
        if (customCategoryRadio.checked) {
            const customValue = customCategoryInput.value.trim();
            if (customValue) {
                const tempInput = document.createElement('input');
                tempInput.type = 'hidden';
                tempInput.name = 'category';
                tempInput.value = customValue;
                this.appendChild(tempInput);
            }
        }
    });

    // ============================================
    // CHARACTER COUNTERS
    // ============================================
    const titleInput = document.getElementById('title');
    const titleCounter = document.getElementById('titleCounter');
    const excerptInput = document.getElementById('excerpt');
    const excerptCounter = document.getElementById('excerptCounter');

    titleInput.addEventListener('input', function() {
        titleCounter.textContent = this.value.length;
    });

    excerptInput.addEventListener('input', function() {
        excerptCounter.textContent = this.value.length;
    });
</script>
@endsection