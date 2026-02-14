@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('header_title', 'General Settings')

@push('styles')
<style>
    /* ============================================
       SETTINGS PAGE - CORAL THEME
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

    .settings-container {
        max-width: 900px;
        margin: 0 auto;
    }

    /* Modern Card */
    .modern-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 1.5rem;
    }

    .modern-card-header {
        padding: 1.75rem 2rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
        border-bottom: 2px solid var(--gray-100);
    }

    .modern-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modern-card-title i {
        color: var(--coral);
        font-size: 1.5rem;
    }

    .modern-card-subtitle {
        font-size: 0.875rem;
        color: var(--gray-600);
        margin-top: 0.5rem;
        margin-bottom: 0;
    }

    .modern-card-body {
        padding: 2rem;
    }

    /* Success Alert */
    .success-alert {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.03));
        border: 1.5px solid rgba(16, 185, 129, 0.2);
        border-left: 4px solid #10B981;
        border-radius: 0.75rem;
        padding: 1.25rem 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .success-alert-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background: rgba(16, 185, 129, 0.15);
        color: #059669;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .success-alert-text {
        color: #047857;
        font-weight: 600;
        font-size: 0.9375rem;
        margin: 0;
    }

    /* Section Headers */
    .section-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--gray-100);
    }

    .section-header i {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        color: var(--coral);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .section-header h6 {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--navy);
        margin: 0;
    }

    .section-divider {
        margin: 2rem 0;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.625rem;
    }

    .form-label i {
        color: var(--coral);
        font-size: 1rem;
    }

    .form-label .required {
        color: #EF4444;
        margin-left: 0.25rem;
    }

    .modern-input,
    .modern-textarea {
        width: 100%;
        padding: 0.875rem 1.125rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        font-size: 0.9375rem;
        color: var(--gray-700);
        transition: all 0.2s ease;
        background: white;
        font-family: inherit;
    }

    .modern-input:focus,
    .modern-textarea:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.1);
        background: rgba(255, 107, 107, 0.02);
    }

    .modern-input::placeholder,
    .modern-textarea::placeholder {
        color: var(--gray-400);
    }

    .modern-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-help-text {
        font-size: 0.8125rem;
        color: var(--gray-500);
        margin-top: 0.5rem;
        display: flex;
        align-items: start;
        gap: 0.375rem;
    }

    .form-help-text i {
        color: var(--coral);
        font-size: 0.875rem;
        margin-top: 0.125rem;
    }

    /* Input Icons */
    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--coral);
        font-size: 1rem;
        pointer-events: none;
    }

    .input-with-icon .modern-input {
        padding-left: 2.75rem;
    }

    /* Buttons */
    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.875rem 2rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        border-radius: 0.5rem;
        font-weight: 700;
        font-size: 0.9375rem;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.25);
        cursor: pointer;
    }

    .btn-save:hover {
        background: linear-gradient(135deg, var(--coral-dark), var(--coral));
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.35);
        color: white;
    }

    .btn-save:active {
        transform: translateY(0);
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.875rem 1.75rem;
        background: white;
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 0.9375rem;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .btn-cancel:hover {
        background: var(--gray-50);
        border-color: var(--gray-400);
        color: var(--gray-900);
    }

    .button-group {
        display: flex;
        gap: 0.75rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid var(--gray-100);
    }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(59, 130, 246, 0.02));
        border: 1.5px solid rgba(59, 130, 246, 0.15);
        border-left: 4px solid #3B82F6;
        border-radius: 0.75rem;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        gap: 1rem;
    }

    .info-box-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .info-box-content h6 {
        font-size: 0.9375rem;
        font-weight: 700;
        color: #1E40AF;
        margin-bottom: 0.375rem;
    }

    .info-box-content p {
        font-size: 0.875rem;
        color: #1E40AF;
        margin: 0;
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {

        .modern-card-header,
        .modern-card-body {
            padding: 1.5rem;
        }

        .modern-card-title {
            font-size: 1.125rem;
        }

        .button-group {
            flex-direction: column;
        }

        .btn-save,
        .btn-cancel {
            width: 100%;
            justify-content: center;
        }

        .info-box {
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')
<div class="settings-container">
    <!-- Success Alert -->
    @if(session('success'))
    <div class="success-alert">
        <div class="success-alert-icon">
            <i class="bi bi-check-circle-fill"></i>
        </div>
        <p class="success-alert-text">{{ session('success') }}</p>
    </div>
    @endif

    <!-- Info Box -->
    <div class="info-box">
        <div class="info-box-icon">
            <i class="bi bi-info-circle-fill"></i>
        </div>
        <div class="info-box-content">
            <h6>Settings Information</h6>
            <p>Configure your website's general settings including contact information and social media links. All changes will be reflected across the entire website.</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <!-- Contact Information Card -->
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="modern-card-title">
                    <i class="bi bi-building"></i>
                    Contact Information
                </h5>
                <p class="modern-card-subtitle">Manage your company's contact details displayed on the website</p>
            </div>

            <div class="modern-card-body">
                <!-- Company Name -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-building"></i>
                        Company Name
                        <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        name="site_name"
                        class="modern-input"
                        value="{{ $settings['site_name'] ?? '' }}"
                        placeholder="Enter your company name"
                        required>
                </div>

                <!-- Official Email -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-envelope-fill"></i>
                        Official Email
                        <span class="required">*</span>
                    </label>
                    <input
                        type="email"
                        name="site_email"
                        class="modern-input"
                        value="{{ $settings['site_email'] ?? '' }}"
                        placeholder="company@example.com"
                        required>
                    <div class="form-help-text">
                        <i class="bi bi-info-circle-fill"></i>
                        This email will be used for contact form submissions
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-telephone-fill"></i>
                        Phone Number
                    </label>
                    <input
                        type="text"
                        name="site_phone"
                        class="modern-input"
                        value="{{ $settings['site_phone'] ?? '' }}"
                        placeholder="+62 812-3456-7890">
                    <div class="form-help-text">
                        <i class="bi bi-info-circle-fill"></i>
                        Include country code for international format
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-geo-alt-fill"></i>
                        Address
                    </label>
                    <textarea
                        name="site_address"
                        class="modern-textarea"
                        rows="3"
                        placeholder="Enter your complete business address">{{ $settings['site_address'] ?? '' }}</textarea>
                </div>

                <!-- Google Maps Embed -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-map-fill"></i>
                        Google Maps Embed URL
                    </label>
                    <input
                        type="url"
                        name="google_maps_embed"
                        class="modern-input"
                        value="{{ $settings['google_maps_embed'] ?? '' }}"
                        placeholder="https://www.google.com/maps/embed?pb=...">
                    <div class="form-help-text">
                        <i class="bi bi-info-circle-fill"></i>
                        Go to Google Maps → Share → Embed a map → Copy only the URL inside src="..."
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media Card -->
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="modern-card-title">
                    <i class="bi bi-share-fill"></i>
                    Social Media Links
                </h5>
                <p class="modern-card-subtitle">Connect your social media profiles to display on the website</p>
            </div>

            <div class="modern-card-body">
                <!-- Facebook -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-facebook"></i>
                        Facebook URL
                    </label>
                    <input
                        type="url"
                        name="social_facebook"
                        class="modern-input"
                        value="{{ $settings['social_facebook'] ?? '' }}"
                        placeholder="https://facebook.com/yourpage">
                </div>

                <!-- Instagram -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-instagram"></i>
                        Instagram URL
                    </label>
                    <input
                        type="url"
                        name="social_instagram"
                        class="modern-input"
                        value="{{ $settings['social_instagram'] ?? '' }}"
                        placeholder="https://instagram.com/yourprofile">
                </div>

                <!-- Twitter/X -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-twitter-x"></i>
                        Twitter/X URL
                    </label>
                    <input
                        type="url"
                        name="social_twitter"
                        class="modern-input"
                        value="{{ $settings['social_twitter'] ?? '' }}"
                        placeholder="https://twitter.com/yourhandle">
                </div>

                <!-- LinkedIn -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-linkedin"></i>
                        LinkedIn URL
                    </label>
                    <input
                        type="url"
                        name="social_linkedin"
                        class="modern-input"
                        value="{{ $settings['social_linkedin'] ?? '' }}"
                        placeholder="https://linkedin.com/company/yourcompany">
                </div>

                <!-- GitHub -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-github"></i>
                        GitHub URL
                    </label>
                    <input
                        type="url"
                        name="social_github"
                        class="modern-input"
                        value="{{ $settings['social_github'] ?? '' }}"
                        placeholder="https://github.com/yourorganization">
                </div>

                <!-- YouTube -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-youtube"></i>
                        YouTube URL
                    </label>
                    <input
                        type="url"
                        name="social_youtube"
                        class="modern-input"
                        value="{{ $settings['social_youtube'] ?? '' }}"
                        placeholder="https://youtube.com/@yourchannel">
                </div>

                <!-- Action Buttons -->
                <div class="button-group">
                    <button type="submit" class="btn-save">
                        <i class="bi bi-check-circle-fill"></i>
                        Save Settings
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn-cancel">
                        <i class="bi bi-x-circle"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection