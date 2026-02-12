@extends('admin.layouts.app')

@section('title', 'Add Service')
@section('header_title', 'Create New Service')

@push('styles')
<style>
    /* ============================================
       CREATE SERVICE STYLES - CORAL THEME
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

    /* Image Upload Preview */
    .image-upload-wrapper {
        position: relative;
    }

    .image-preview-container {
        margin-top: 1rem;
        display: none;
    }

    .image-preview-container.active {
        display: block;
    }

    .image-preview {
        width: 200px;
        height: 200px;
        border-radius: 0.75rem;
        object-fit: cover;
        border: 2px solid var(--gray-200);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .remove-image-btn {
        position: absolute;
        top: -0.5rem;
        right: -0.5rem;
        width: 2rem;
        height: 2rem;
        background: #EF4444;
        color: white;
        border: 2px solid white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 1rem;
    }

    .remove-image-btn:hover {
        background: #DC2626;
        transform: scale(1.1);
    }

    /* Icon Picker Button */
    .icon-picker-btn {
        width: 100%;
        padding: 0.75rem;
        background: white;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 0.9375rem;
        color: var(--gray-700);
    }

    .icon-picker-btn:hover {
        border-color: var(--coral);
        background: rgba(255, 107, 107, 0.02);
    }

    .icon-picker-btn.has-icon {
        color: var(--gray-900);
        font-weight: 500;
    }

    .icon-picker-btn-content {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .icon-picker-btn-icon {
        font-size: 1.5rem;
        color: var(--coral);
        width: 2rem;
        text-align: center;
    }

    .icon-picker-btn-text {
        flex: 1;
    }

    .icon-picker-btn-arrow {
        color: var(--gray-400);
        font-size: 1rem;
    }

    /* Icon Preview Box */
    .icon-preview-box {
        margin-top: 1rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        border-radius: 0.75rem;
        border: 2px dashed var(--coral);
        display: none;
        text-align: center;
    }

    .icon-preview-box.active {
        display: block;
    }

    .icon-preview-large {
        font-size: 4rem;
        color: var(--coral);
        margin-bottom: 0.5rem;
    }

    .icon-preview-label {
        color: var(--gray-600);
        font-size: 0.875rem;
        font-weight: 600;
    }

    .icon-preview-name {
        color: var(--gray-500);
        font-size: 0.75rem;
        margin-top: 0.25rem;
        font-family: monospace;
    }

    /* Icon Picker Modal */
    .icon-picker-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1050;
        overflow-y: auto;
        padding: 2rem 1rem;
    }

    .icon-picker-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-picker-modal-content {
        background: white;
        border-radius: 1rem;
        width: 100%;
        max-width: 900px;
        max-height: 90vh;
        display: flex;
        flex-direction: column;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .icon-picker-modal-header {
        padding: 1.5rem 2rem;
        border-bottom: 2px solid var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .icon-picker-modal-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 0;
    }

    .icon-picker-modal-title i {
        color: var(--coral);
        font-size: 1.5rem;
    }

    .icon-picker-modal-close {
        width: 2.5rem;
        height: 2.5rem;
        border: none;
        background: var(--gray-100);
        color: var(--gray-600);
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .icon-picker-modal-close:hover {
        background: var(--gray-200);
        color: var(--gray-900);
    }

    .icon-picker-modal-search {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--gray-100);
    }

    .icon-search-input {
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

    .icon-search-input:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
    }

    .icon-picker-modal-body {
        padding: 1.5rem 2rem;
        overflow-y: auto;
        flex: 1;
    }

    .icon-categories {
        margin-bottom: 1.5rem;
    }

    .icon-category-title {
        font-size: 0.875rem;
        font-weight: 700;
        color: var(--coral);
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .icon-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 0.75rem;
        margin-bottom: 2rem;
    }

    .icon-item {
        aspect-ratio: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 0.5rem;
        border: 1.5px solid var(--gray-200);
        border-radius: 0.75rem;
        cursor: pointer;
        transition: all 0.2s ease;
        background: white;
    }

    .icon-item:hover {
        border-color: var(--coral);
        background: rgba(255, 107, 107, 0.05);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.15);
    }

    .icon-item.selected {
        border-color: var(--coral);
        background: rgba(255, 107, 107, 0.1);
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.2);
    }

    .icon-item i {
        font-size: 2rem;
        color: var(--coral);
    }

    .icon-item-name {
        font-size: 0.625rem;
        color: var(--gray-500);
        text-align: center;
        line-height: 1.2;
        word-break: break-word;
        font-weight: 500;
    }

    .icon-item.selected .icon-item-name {
        color: var(--coral);
        font-weight: 600;
    }

    .no-results {
        text-align: center;
        padding: 3rem 1rem;
        color: var(--gray-500);
    }

    .no-results i {
        font-size: 3rem;
        color: var(--gray-300);
        margin-bottom: 1rem;
    }

    .no-results p {
        font-size: 1rem;
        font-weight: 600;
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

        .image-preview {
            width: 150px;
            height: 150px;
        }

        .icon-grid {
            grid-template-columns: repeat(auto-fill, minmax(70px, 1fr));
            gap: 0.5rem;
        }

        .icon-picker-modal-content {
            max-height: 95vh;
        }

        .icon-picker-modal {
            padding: 1rem 0.5rem;
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
                Creating a New Service
            </div>
            <p class="info-box-text">
                Services showcase what your company offers to clients. Include a clear title, engaging description,
                and relevant icon or image. Active services will be displayed on your website's services page.
            </p>
        </div>

        <!-- Main Card -->
        <div class="modern-card">
            <div class="modern-card-header">
                <h5>
                    <i class="bi bi-briefcase-fill"></i>
                    New Service Form
                </h5>
            </div>

            <div class="modern-card-body">
                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
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
                                Service Title
                                <span class="required">*</span>
                            </label>
                            <input type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="e.g., Web Development"
                                required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-lightbulb-fill"></i>
                                <span>A clear, concise name for your service offering</span>
                            </div>
                        </div>

                        <!-- Icon and Image Row -->
                        <div class="row">
                            <!-- Icon Picker Field -->
                            <div class="col-md-6 mb-4">
                                <label for="icon" class="form-label">
                                    Service Icon
                                </label>

                                <!-- Hidden input to store icon class -->
                                <input type="hidden" id="icon" name="icon" value="{{ old('icon') }}">

                                <!-- Icon Picker Button -->
                                <div class="icon-picker-btn" id="iconPickerBtn">
                                    <div class="icon-picker-btn-content">
                                        <div class="icon-picker-btn-icon">
                                            <i class="bi bi-stars" id="selectedIconDisplay"></i>
                                        </div>
                                        <div class="icon-picker-btn-text">
                                            <span id="iconPickerBtnText">Choose an icon...</span>
                                        </div>
                                    </div>
                                    <i class="bi bi-chevron-down icon-picker-btn-arrow"></i>
                                </div>

                                <div class="form-text">
                                    <i class="bi bi-palette-fill"></i>
                                    <span>Click to browse and select an icon for this service</span>
                                </div>

                                <!-- Icon Preview Box -->
                                <div class="icon-preview-box" id="iconPreviewBox">
                                    <div class="icon-preview-large" id="iconPreviewLarge">
                                        <i class="bi bi-stars"></i>
                                    </div>
                                    <div class="icon-preview-label">Selected Icon</div>
                                    <div class="icon-preview-name" id="iconPreviewName">No icon selected</div>
                                </div>
                            </div>

                            <!-- Image Upload Field -->
                            <div class="col-md-6 mb-4">
                                <label for="image" class="form-label">
                                    Featured Image
                                </label>
                                <div class="image-upload-wrapper">
                                    <input type="file"
                                        class="form-control @error('image') is-invalid @enderror"
                                        id="image"
                                        name="image"
                                        accept="image/*">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <i class="bi bi-image-fill"></i>
                                        <span>Recommended: 800x600px, max 2MB</span>
                                    </div>

                                    <!-- Image Preview -->
                                    <div class="image-preview-container" id="imagePreviewContainer">
                                        <div class="position-relative d-inline-block">
                                            <img id="imagePreview" src="" alt="Preview" class="image-preview">
                                            <button type="button" class="remove-image-btn" id="removeImageBtn">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-4">
                            <label for="short_description" class="form-label">
                                Short Description
                                <span class="required">*</span>
                            </label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror"
                                id="short_description"
                                name="short_description"
                                rows="3"
                                maxlength="200"
                                placeholder="A brief summary of this service..."
                                required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="char-counter">
                                <span id="short-desc-count">0</span> / 200 characters
                            </div>
                            <div class="form-text">
                                <i class="bi bi-card-text"></i>
                                <span>This brief summary will be displayed on the home page services section</span>
                            </div>
                        </div>

                        <!-- Full Description -->
                        <div class="mb-4">
                            <label for="full_description" class="form-label">
                                Full Description
                            </label>
                            <div class="tinymce-wrapper">
                                <textarea class="form-control"
                                    id="full_description"
                                    name="full_description"
                                    rows="10">{{ old('full_description') }}</textarea>
                            </div>
                            <div class="form-text">
                                <i class="bi bi-file-text"></i>
                                <span>Detailed information about the service, shown on the dedicated services page</span>
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
                                Publish Service Immediately
                            </label>
                        </div>
                        <div class="form-text">
                            <i class="bi bi-eye-fill"></i>
                            <span>When enabled, this service will be visible on your website right away</span>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.services.index') }}" class="btn-secondary-custom">
                            <i class="bi bi-arrow-left"></i>
                            Back to List
                        </a>
                        <button type="submit" class="btn-primary-custom">
                            <i class="bi bi-check-circle-fill"></i>
                            Create Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Icon Picker Modal -->
<div class="icon-picker-modal" id="iconPickerModal">
    <div class="icon-picker-modal-content">
        <div class="icon-picker-modal-header">
            <h5 class="icon-picker-modal-title">
                <i class="bi bi-palette-fill"></i>
                Choose an Icon
            </h5>
            <button type="button" class="icon-picker-modal-close" id="closeModalBtn">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="icon-picker-modal-search">
            <input type="text"
                class="icon-search-input"
                id="iconSearchInput"
                placeholder="Search icons... (e.g., code, heart, star)">
        </div>

        <div class="icon-picker-modal-body" id="iconPickerModalBody">
            <!-- Icons will be loaded here by JavaScript -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // ==========================================
    // POPULAR BOOTSTRAP ICONS FOR SERVICES
    // ==========================================
    const serviceIcons = {
        'Development': [{
                class: 'bi-code-slash',
                name: 'Code'
            },
            {
                class: 'bi-code-square',
                name: 'Code Square'
            },
            {
                class: 'bi-file-code',
                name: 'File Code'
            },
            {
                class: 'bi-braces',
                name: 'Braces'
            },
            {
                class: 'bi-terminal',
                name: 'Terminal'
            },
            {
                class: 'bi-laptop',
                name: 'Laptop'
            },
            {
                class: 'bi-pc-display',
                name: 'PC Display'
            },
            {
                class: 'bi-device-hdd',
                name: 'Device HDD'
            },
        ],
        'Mobile & Apps': [{
                class: 'bi-phone',
                name: 'Phone'
            },
            {
                class: 'bi-tablet',
                name: 'Tablet'
            },
            {
                class: 'bi-phone-vibrate',
                name: 'Phone Vibrate'
            },
            {
                class: 'bi-phone-flip',
                name: 'Phone Flip'
            },
            {
                class: 'bi-app',
                name: 'App'
            },
            {
                class: 'bi-app-indicator',
                name: 'App Indicator'
            },
            {
                class: 'bi-smartwatch',
                name: 'Smartwatch'
            },
            {
                class: 'bi-tablet-landscape',
                name: 'Tablet Landscape'
            },
        ],
        'Design & Creative': [{
                class: 'bi-palette',
                name: 'Palette'
            },
            {
                class: 'bi-palette2',
                name: 'Palette 2'
            },
            {
                class: 'bi-brush',
                name: 'Brush'
            },
            {
                class: 'bi-pencil',
                name: 'Pencil'
            },
            {
                class: 'bi-pen',
                name: 'Pen'
            },
            {
                class: 'bi-vector-pen',
                name: 'Vector Pen'
            },
            {
                class: 'bi-bezier',
                name: 'Bezier'
            },
            {
                class: 'bi-bezier2',
                name: 'Bezier 2'
            },
        ],
        'Business & Office': [{
                class: 'bi-briefcase',
                name: 'Briefcase'
            },
            {
                class: 'bi-graph-up',
                name: 'Graph Up'
            },
            {
                class: 'bi-bar-chart',
                name: 'Bar Chart'
            },
            {
                class: 'bi-pie-chart',
                name: 'Pie Chart'
            },
            {
                class: 'bi-calculator',
                name: 'Calculator'
            },
            {
                class: 'bi-cash',
                name: 'Cash'
            },
            {
                class: 'bi-currency-dollar',
                name: 'Dollar'
            },
            {
                class: 'bi-building',
                name: 'Building'
            },
        ],
        'Communication': [{
                class: 'bi-chat',
                name: 'Chat'
            },
            {
                class: 'bi-chat-dots',
                name: 'Chat Dots'
            },
            {
                class: 'bi-chat-square',
                name: 'Chat Square'
            },
            {
                class: 'bi-envelope',
                name: 'Envelope'
            },
            {
                class: 'bi-mailbox',
                name: 'Mailbox'
            },
            {
                class: 'bi-telephone',
                name: 'Telephone'
            },
            {
                class: 'bi-headset',
                name: 'Headset'
            },
            {
                class: 'bi-megaphone',
                name: 'Megaphone'
            },
        ],
        'Cloud & Network': [{
                class: 'bi-cloud',
                name: 'Cloud'
            },
            {
                class: 'bi-cloud-upload',
                name: 'Cloud Upload'
            },
            {
                class: 'bi-cloud-download',
                name: 'Cloud Download'
            },
            {
                class: 'bi-server',
                name: 'Server'
            },
            {
                class: 'bi-hdd',
                name: 'HDD'
            },
            {
                class: 'bi-hdd-network',
                name: 'HDD Network'
            },
            {
                class: 'bi-router',
                name: 'Router'
            },
            {
                class: 'bi-ethernet',
                name: 'Ethernet'
            },
        ],
        'Security': [{
                class: 'bi-shield',
                name: 'Shield'
            },
            {
                class: 'bi-shield-check',
                name: 'Shield Check'
            },
            {
                class: 'bi-shield-lock',
                name: 'Shield Lock'
            },
            {
                class: 'bi-lock',
                name: 'Lock'
            },
            {
                class: 'bi-key',
                name: 'Key'
            },
            {
                class: 'bi-fingerprint',
                name: 'Fingerprint'
            },
            {
                class: 'bi-eye',
                name: 'Eye'
            },
            {
                class: 'bi-incognito',
                name: 'Incognito'
            },
        ],
        'Media & Content': [{
                class: 'bi-camera',
                name: 'Camera'
            },
            {
                class: 'bi-image',
                name: 'Image'
            },
            {
                class: 'bi-play-circle',
                name: 'Play Circle'
            },
            {
                class: 'bi-film',
                name: 'Film'
            },
            {
                class: 'bi-music-note',
                name: 'Music Note'
            },
            {
                class: 'bi-mic',
                name: 'Microphone'
            },
            {
                class: 'bi-soundwave',
                name: 'Soundwave'
            },
            {
                class: 'bi-broadcast',
                name: 'Broadcast'
            },
        ],
        'IoT & Hardware': [{
                class: 'bi-cpu',
                name: 'CPU'
            },
            {
                class: 'bi-gpu-card',
                name: 'GPU Card'
            },
            {
                class: 'bi-motherboard',
                name: 'Motherboard'
            },
            {
                class: 'bi-memory',
                name: 'Memory'
            },
            {
                class: 'bi-usb',
                name: 'USB'
            },
            {
                class: 'bi-bluetooth',
                name: 'Bluetooth'
            },
            {
                class: 'bi-wifi',
                name: 'WiFi'
            },
            {
                class: 'bi-broadcast-pin',
                name: 'Broadcast Pin'
            },
        ],
        'E-commerce': [{
                class: 'bi-cart',
                name: 'Cart'
            },
            {
                class: 'bi-bag',
                name: 'Bag'
            },
            {
                class: 'bi-credit-card',
                name: 'Credit Card'
            },
            {
                class: 'bi-wallet',
                name: 'Wallet'
            },
            {
                class: 'bi-shop',
                name: 'Shop'
            },
            {
                class: 'bi-receipt',
                name: 'Receipt'
            },
            {
                class: 'bi-tag',
                name: 'Tag'
            },
            {
                class: 'bi-gift',
                name: 'Gift'
            },
        ]
    };

    // ==========================================
    // ICON PICKER FUNCTIONALITY
    // ==========================================
    let selectedIcon = '';

    // Initialize TinyMCE
    tinymce.init({
        selector: '#full_description',
        height: 400,
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

    // Render icons in modal
    function renderIcons(searchTerm = '') {
        const modalBody = document.getElementById('iconPickerModalBody');
        let html = '';

        Object.keys(serviceIcons).forEach(category => {
            const filteredIcons = serviceIcons[category].filter(icon =>
                icon.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                icon.class.toLowerCase().includes(searchTerm.toLowerCase())
            );

            if (filteredIcons.length > 0) {
                html += `
                    <div class="icon-categories">
                        <div class="icon-category-title">${category}</div>
                        <div class="icon-grid">
                `;

                filteredIcons.forEach(icon => {
                    const isSelected = selectedIcon === `bi ${icon.class}`;
                    html += `
                        <div class="icon-item ${isSelected ? 'selected' : ''}" data-icon="bi ${icon.class}" data-name="${icon.name}">
                            <i class="bi ${icon.class}"></i>
                            <div class="icon-item-name">${icon.name}</div>
                        </div>
                    `;
                });

                html += `
                        </div>
                    </div>
                `;
            }
        });

        if (html === '') {
            html = `
                <div class="no-results">
                    <i class="bi bi-search"></i>
                    <p>No icons found matching "${searchTerm}"</p>
                </div>
            `;
        }

        modalBody.innerHTML = html;

        // Add click event to all icon items
        document.querySelectorAll('.icon-item').forEach(item => {
            item.addEventListener('click', function() {
                selectIcon(this.dataset.icon, this.dataset.name);
            });
        });
    }

    // Select icon
    function selectIcon(iconClass, iconName) {
        selectedIcon = iconClass;

        // Update hidden input
        document.getElementById('icon').value = iconClass;

        // Update picker button
        document.getElementById('selectedIconDisplay').className = iconClass;
        document.getElementById('iconPickerBtnText').textContent = iconName;
        document.getElementById('iconPickerBtn').classList.add('has-icon');

        // Update preview box
        document.getElementById('iconPreviewLarge').innerHTML = `<i class="${iconClass}"></i>`;
        document.getElementById('iconPreviewName').textContent = iconClass;
        document.getElementById('iconPreviewBox').classList.add('active');

        // Close modal
        document.getElementById('iconPickerModal').classList.remove('active');

        // Update selected state in modal
        renderIcons(document.getElementById('iconSearchInput').value);
    }

    // Open modal
    document.getElementById('iconPickerBtn').addEventListener('click', function() {
        document.getElementById('iconPickerModal').classList.add('active');
        renderIcons();
        document.getElementById('iconSearchInput').focus();
    });

    // Close modal
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('iconPickerModal').classList.remove('active');
    });

    // Close modal when clicking outside
    document.getElementById('iconPickerModal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.remove('active');
        }
    });

    // Search icons
    document.getElementById('iconSearchInput').addEventListener('input', function() {
        renderIcons(this.value);
    });

    // Character counter for Short Description
    const shortDescInput = document.getElementById('short_description');
    const shortDescCount = document.getElementById('short-desc-count');

    if (shortDescInput) {
        shortDescInput.addEventListener('input', function() {
            shortDescCount.textContent = this.value.length;
            if (this.value.length > 180) {
                shortDescCount.style.color = '#F59E0B';
            } else {
                shortDescCount.style.color = '';
            }
        });
        // Initial count
        shortDescCount.textContent = shortDescInput.value.length;
    }

    // Image Preview
    const imageInput = document.getElementById('image');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const removeImageBtn = document.getElementById('removeImageBtn');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.classList.add('active');
            }
            reader.readAsDataURL(file);
        }
    });

    removeImageBtn.addEventListener('click', function() {
        imageInput.value = '';
        imagePreview.src = '';
        imagePreviewContainer.classList.remove('active');
    });

    // Auto-focus first input
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('title').focus();

        // Load old icon value if exists
        const oldIcon = document.getElementById('icon').value;
        if (oldIcon) {
            // Extract icon name from class
            const iconClass = oldIcon.split(' ')[1];
            const iconName = iconClass.split('-').slice(1).map(word =>
                word.charAt(0).toUpperCase() + word.slice(1)
            ).join(' ');

            selectIcon(oldIcon, iconName);
        }
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Close modal on Escape
        if (e.key === 'Escape') {
            document.getElementById('iconPickerModal').classList.remove('active');
        }
    });
</script>
@endsection