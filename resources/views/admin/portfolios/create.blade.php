@extends('admin.layouts.app')

@section('title', 'Add Project')
@section('header_title', 'Create New Project')

@push('styles')
<style>
    /* ============================================
       PORTFOLIO CREATE STYLES - CORAL THEME
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
        min-height: 120px;
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

    /* File Upload */
    .file-upload-wrapper {
        position: relative;
    }

    .file-upload-preview {
        margin-top: 1rem;
        border-radius: 0.75rem;
        overflow: hidden;
        border: 2px dashed var(--gray-300);
        background: var(--gray-50);
        display: none;
    }

    .file-upload-preview.active {
        display: block;
    }

    .file-upload-preview img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
    }

    .file-upload-placeholder {
        padding: 2rem;
        text-align: center;
        color: var(--gray-500);
    }

    .file-upload-placeholder i {
        font-size: 3rem;
        color: var(--gray-400);
        margin-bottom: 1rem;
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

    /* Category Selector with Icons */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .category-option {
        position: relative;
    }

    .category-option input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .category-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        border: 2px solid var(--gray-300);
        border-radius: 0.75rem;
        cursor: pointer;
        transition: all 0.2s ease;
        background: white;
    }

    .category-option input[type="radio"]:checked + .category-label {
        border-color: var(--coral);
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
    }

    .category-label:hover {
        border-color: var(--coral);
        transform: translateY(-2px);
    }

    .category-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        color: var(--coral);
    }

    .category-option input[type="radio"]:checked + .category-label .category-icon {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
    }

    .category-text {
        flex: 1;
    }

    .category-text .category-name {
        font-weight: 600;
        color: var(--navy);
        font-size: 0.9375rem;
    }

    .category-text .category-desc {
        font-size: 0.75rem;
        color: var(--gray-600);
        margin-top: 0.125rem;
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

    .switch-toggle input:checked + .switch-slider {
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
    }

    .switch-toggle input:checked + .switch-slider:before {
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

    .featured-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.25rem 0.625rem;
        background: linear-gradient(135deg, #F59E0B, #D97706);
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

    /* Responsive */
    @media (max-width: 768px) {
        .modern-card-body {
            padding: 1.5rem;
        }

        .category-grid {
            grid-template-columns: 1fr;
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
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5>
                    <i class="bi bi-plus-circle-fill"></i>
                    Project Details
                </h5>
            </div>

            <div class="modern-card-body">
                <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" id="portfolioForm">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="section-title">
                        <i class="bi bi-info-circle-fill"></i>
                        Basic Information
                    </div>

                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="title" class="form-label">
                                <i class="bi bi-file-text-fill"></i>
                                Project Title
                                <span class="required">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control-modern @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   placeholder="e.g. E-Commerce Platform for Fashion Brand"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="client" class="form-label">
                                <i class="bi bi-person-fill"></i>
                                Client Name
                            </label>
                            <input type="text" 
                                   class="form-control-modern" 
                                   id="client" 
                                   name="client" 
                                   value="{{ old('client') }}"
                                   placeholder="e.g. PT. Technology">
                            <small class="form-text-modern">
                                <i class="bi bi-info-circle-fill"></i>
                                Optional
                            </small>
                        </div>
                    </div>

                    <!-- Category Selection -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="bi bi-grid-fill"></i>
                            Project Category
                            <span class="required">*</span>
                        </label>
                        <div class="category-grid">
                            <div class="category-option">
                                <input type="radio" id="cat_web" name="category" value="Web Development" {{ old('category') == 'Web Development' ? 'checked' : '' }} required>
                                <label for="cat_web" class="category-label">
                                    <div class="category-icon">
                                        <i class="bi bi-globe"></i>
                                    </div>
                                    <div class="category-text">
                                        <div class="category-name">Web Development</div>
                                        <div class="category-desc">Website & Web App</div>
                                    </div>
                                </label>
                            </div>

                            <div class="category-option">
                                <input type="radio" id="cat_mobile" name="category" value="Mobile App" {{ old('category') == 'Mobile App' ? 'checked' : '' }}>
                                <label for="cat_mobile" class="category-label">
                                    <div class="category-icon">
                                        <i class="bi bi-phone-fill"></i>
                                    </div>
                                    <div class="category-text">
                                        <div class="category-name">Mobile App</div>
                                        <div class="category-desc">iOS & Android</div>
                                    </div>
                                </label>
                            </div>

                            <div class="category-option">
                                <input type="radio" id="cat_iot" name="category" value="IoT" {{ old('category') == 'IoT' ? 'checked' : '' }}>
                                <label for="cat_iot" class="category-label">
                                    <div class="category-icon">
                                        <i class="bi bi-cpu-fill"></i>
                                    </div>
                                    <div class="category-text">
                                        <div class="category-name">IoT</div>
                                        <div class="category-desc">Internet of Things</div>
                                    </div>
                                </label>
                            </div>

                            <div class="category-option">
                                <input type="radio" id="cat_design" name="category" value="Design" {{ old('category') == 'Design' ? 'checked' : '' }}>
                                <label for="cat_design" class="category-label">
                                    <div class="category-icon">
                                        <i class="bi bi-palette-fill"></i>
                                    </div>
                                    <div class="category-text">
                                        <div class="category-name">Design</div>
                                        <div class="category-desc">UI/UX Design</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @error('category')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="project_url" class="form-label">
                            <i class="bi bi-link-45deg"></i>
                            Project URL
                        </label>
                        <input type="url" 
                               class="form-control-modern" 
                               id="project_url" 
                               name="project_url" 
                               value="{{ old('project_url') }}" 
                               placeholder="https://example.com">
                        <small class="form-text-modern">
                            <i class="bi bi-info-circle-fill"></i>
                            Link to live project or demo
                        </small>
                    </div>

                    <hr class="section-divider">

                    <!-- Media Section -->
                    <div class="section-title">
                        <i class="bi bi-image-fill"></i>
                        Project Media
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">
                            <i class="bi bi-card-image"></i>
                            Project Image / Screenshot
                        </label>
                        <div class="file-upload-wrapper">
                            <input type="file" 
                                   class="form-control-modern @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   onchange="previewImage(event)">
                            @error('image')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-text-modern">
                                <i class="bi bi-info-circle-fill"></i>
                                Recommended size: 1200x800px, Max: 2MB
                            </small>

                            <div class="file-upload-preview" id="imagePreview">
                                <div class="file-upload-placeholder">
                                    <i class="bi bi-image"></i>
                                    <p>Preview will appear here</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="section-divider">

                    <!-- Technical Details Section -->
                    <div class="section-title">
                        <i class="bi bi-code-slash"></i>
                        Technical Details
                    </div>

                    <div class="form-group">
                        <label for="technologies" class="form-label">
                            <i class="bi bi-stack"></i>
                            Technologies Used
                        </label>
                        <div class="tag-input-wrapper">
                            <div class="tag-container" id="tagContainer" onclick="focusTagInput()">
                                <input type="text" 
                                       class="tag-input" 
                                       id="tagInput" 
                                       placeholder="Type and press Enter to add technology..."
                                       autocomplete="off">
                            </div>
                            <div class="tag-suggestions" id="tagSuggestions"></div>
                            <input type="hidden" name="technologies" id="technologiesHidden" value="{{ old('technologies') }}">
                        </div>
                        <small class="form-text-modern">
                            <i class="bi bi-info-circle-fill"></i>
                            Type technology name and press Enter. Example: Laravel, Vue.js, MySQL, etc.
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">
                            <i class="bi bi-text-paragraph"></i>
                            Project Description
                            <span class="required">*</span>
                        </label>
                        <textarea class="form-control-modern @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="6" 
                                  placeholder="Describe your project, its goals, challenges, and solutions..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <hr class="section-divider">

                    <!-- Settings Section -->
                    <div class="section-title">
                        <i class="bi bi-gear-fill"></i>
                        Project Settings
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="switch-wrapper">
                                <label class="switch-toggle">
                                    <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    <span class="switch-slider"></span>
                                </label>
                                <div class="switch-label">
                                    <div class="switch-label-title">
                                        <i class="bi bi-eye-fill"></i>
                                        Active Status
                                    </div>
                                    <div class="switch-label-desc">Show this project on website</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <div class="switch-wrapper">
                                <label class="switch-toggle">
                                    <input type="checkbox" id="is_featured" name="is_featured" value="1">
                                    <span class="switch-slider"></span>
                                </label>
                                <div class="switch-label">
                                    <div class="switch-label-title">
                                        <i class="bi bi-star-fill"></i>
                                        Featured Project
                                        <span class="featured-badge">
                                            <i class="bi bi-lightning-fill"></i>
                                            HIGHLIGHT
                                        </span>
                                    </div>
                                    <div class="switch-label-desc">Display on homepage as featured work</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.portfolios.index') }}" class="btn-secondary-custom">
                            <i class="bi bi-arrow-left"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn-primary-custom">
                            <i class="bi bi-check-circle-fill"></i>
                            Save Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// ============================================
// IMAGE PREVIEW
// ============================================
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
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
const technologiesHidden = document.getElementById('technologiesHidden');
let tags = [];

// Common technology suggestions
const commonTechnologies = [
    'Laravel', 'PHP', 'MySQL', 'PostgreSQL', 'MongoDB',
    'Vue.js', 'React', 'Angular', 'JavaScript', 'TypeScript',
    'Node.js', 'Express.js', 'Next.js', 'Nuxt.js',
    'Bootstrap', 'Tailwind CSS', 'Material UI', 'Ant Design',
    'Docker', 'Kubernetes', 'AWS', 'Azure', 'Google Cloud',
    'Redis', 'Elasticsearch', 'RabbitMQ', 'Kafka',
    'Git', 'GitHub', 'GitLab', 'Bitbucket',
    'REST API', 'GraphQL', 'WebSocket',
    'Python', 'Django', 'Flask', 'FastAPI',
    'Java', 'Spring Boot', 'Hibernate',
    'C#', '.NET', 'ASP.NET',
    'Flutter', 'React Native', 'Ionic',
    'Arduino', 'Raspberry Pi', 'ESP32',
    'Figma', 'Adobe XD', 'Sketch', 'Photoshop'
];

// Load existing tags from old input
if (technologiesHidden.value) {
    tags = technologiesHidden.value.split(',').map(tag => tag.trim()).filter(tag => tag);
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
    // Remove all existing tag items
    const existingTags = tagContainer.querySelectorAll('.tag-item');
    existingTags.forEach(tag => tag.remove());
    
    // Add tags before the input
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
    technologiesHidden.value = tags.join(', ');
}

function showSuggestions(query) {
    const filtered = commonTechnologies.filter(tech => 
        tech.toLowerCase().includes(query.toLowerCase()) && !tags.includes(tech)
    );
    
    if (filtered.length > 0) {
        tagSuggestions.innerHTML = filtered.slice(0, 5).map(tech => `
            <div class="tag-suggestion-item" onclick="addTag('${tech}')">
                <i class="bi bi-plus-circle-fill"></i>
                ${tech}
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

// Event Listeners
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

// Click outside to hide suggestions
document.addEventListener('click', function(e) {
    if (!tagContainer.contains(e.target) && !tagSuggestions.contains(e.target)) {
        hideSuggestions();
    }
});

// ============================================
// FORM VALIDATION
// ============================================
document.getElementById('portfolioForm').addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();
    const category = document.querySelector('input[name="category"]:checked');
    const description = document.getElementById('description').value.trim();
    
    if (!title || !category || !description) {
        e.preventDefault();
        alert('Please fill in all required fields (marked with *)');
        return false;
    }
});
</script>
@endsection