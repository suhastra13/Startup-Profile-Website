@extends('admin.layouts.app')

@section('title', 'Read Message')
@section('header_title', 'Message Details')

@push('styles')
<style>
    /* ============================================
       MESSAGE DETAIL - CORAL THEME
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

    /* Back Button */
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        background: white;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        color: var(--gray-700);
        font-weight: 600;
        font-size: 0.9375rem;
        text-decoration: none;
        transition: all 0.2s ease;
        margin-bottom: 1.5rem;
    }

    .back-button:hover {
        background: var(--gray-50);
        border-color: var(--coral);
        color: var(--coral);
        transform: translateX(-4px);
    }

    .back-button i {
        font-size: 1rem;
    }

    /* Modern Card */
    .modern-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-200);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Message Header */
    .message-header {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.08), rgba(255, 107, 107, 0.03));
        border-bottom: 2px solid var(--gray-100);
        padding: 2rem 2.5rem;
    }

    .message-subject-row {
        display: flex;
        align-items: start;
        justify-content: space-between;
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    .message-subject {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--navy);
        line-height: 1.3;
        margin: 0;
    }

    .message-status-badge {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        flex-shrink: 0;
    }

    .message-status-badge.new {
        background: rgba(239, 68, 68, 0.1);
        color: #DC2626;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .message-status-badge.read {
        background: rgba(107, 114, 128, 0.1);
        color: var(--gray-600);
        border: 1px solid rgba(107, 114, 128, 0.2);
    }

    .message-meta {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-600);
        font-size: 0.9375rem;
        font-weight: 500;
    }

    .message-meta i {
        color: var(--coral);
        font-size: 1rem;
    }

    /* Sender Section */
    .sender-section {
        background: white;
        border-bottom: 2px solid var(--gray-100);
        padding: 2rem 2.5rem;
    }

    .sender-card {
        display: flex;
        align-items: start;
        gap: 1.25rem;
    }

    .sender-avatar-large {
        width: 4rem;
        height: 4rem;
        border-radius: 1rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.5rem;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }

    .sender-info-large {
        flex: 1;
    }

    .sender-name-large {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 0.75rem;
    }

    .sender-contacts {
        display: flex;
        flex-direction: column;
        gap: 0.625rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--gray-700);
        font-size: 0.9375rem;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .contact-item i {
        width: 1.5rem;
        height: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--coral);
        font-size: 1.125rem;
    }

    .contact-item:hover {
        color: var(--coral);
    }

    .contact-item:hover i {
        transform: scale(1.1);
    }

    /* Message Content */
    .message-content-section {
        padding: 2.5rem;
    }

    .content-label {
        font-size: 0.875rem;
        font-weight: 700;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 1rem;
    }

    .message-body {
        background: var(--gray-50);
        border: 1.5px solid var(--gray-200);
        border-radius: 0.75rem;
        padding: 2rem;
        font-size: 0.9375rem;
        line-height: 1.7;
        color: var(--gray-700);
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    /* Action Section */
    .action-section {
        background: var(--gray-50);
        border-top: 2px solid var(--gray-100);
        padding: 2rem 2.5rem;
    }

    .action-buttons-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
        align-items: stretch;
    }

    .action-buttons-group {
        display: contents;
    }

    .btn-primary-action,
    .btn-secondary-action,
    .btn-danger-action,
    .btn-mark-read {
        width: 100%;
        justify-content: center;
    }

    .btn-primary-action {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.875rem 1.75rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        border: none;
        border-radius: 0.5rem;
        font-weight: 700;
        font-size: 0.9375rem;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.25);
    }

    .btn-primary-action:hover {
        background: linear-gradient(135deg, var(--coral-dark), var(--coral));
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.35);
        color: white;
    }

    .btn-secondary-action {
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
    }

    .btn-secondary-action:hover {
        background: var(--gray-50);
        border-color: var(--gray-400);
        color: var(--gray-900);
        transform: translateY(-2px);
    }

    .btn-secondary-action.green {
        border-color: rgba(16, 185, 129, 0.3);
        color: #059669;
    }

    .btn-secondary-action.green:hover {
        background: rgba(16, 185, 129, 0.05);
        border-color: #10B981;
        color: #059669;
    }

    .btn-secondary-action.emerald {
        border-color: rgba(16, 185, 129, 0.3);
        color: #059669;
    }

    .btn-secondary-action.emerald:hover {
        background: rgba(16, 185, 129, 0.05);
        border-color: #10B981;
    }

    .btn-danger-action {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.875rem 1.75rem;
        background: white;
        color: #EF4444;
        border: 1.5px solid rgba(239, 68, 68, 0.3);
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 0.9375rem;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .btn-danger-action:hover {
        background: rgba(239, 68, 68, 0.05);
        border-color: #EF4444;
        color: #DC2626;
        transform: translateY(-2px);
    }

    .btn-mark-read {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.875rem 1.75rem;
        background: white;
        color: #10B981;
        border: 1.5px solid rgba(16, 185, 129, 0.3);
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 0.9375rem;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .btn-mark-read:hover {
        background: rgba(16, 185, 129, 0.05);
        border-color: #10B981;
        color: #059669;
        transform: translateY(-2px);
    }


    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(59, 130, 246, 0.02));
        border: 1.5px solid rgba(59, 130, 246, 0.15);
        border-left: 4px solid #3B82F6;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-top: 2rem;
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

    .info-box-content h4 {
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
        .message-header,
        .sender-section,
        .message-content-section,
        .action-section {
            padding: 1.5rem;
        }

        .message-subject-row {
            flex-direction: column;
            gap: 1rem;
        }

        .message-subject {
            font-size: 1.5rem;
        }

        .sender-avatar-large {
            width: 3.5rem;
            height: 3.5rem;
            font-size: 1.25rem;
        }

        .sender-name-large {
            font-size: 1.125rem;
        }

        .message-body {
            padding: 1.5rem;
        }

        .action-buttons-row {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .info-box {
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')
<!-- Back Button -->
<a href="{{ route('admin.messages.index') }}" class="back-button">
    <i class="bi bi-arrow-left"></i>
    Back to Inbox
</a>

<!-- Main Message Card -->
<div class="modern-card">
    <!-- Message Header -->
    <div class="message-header">
        <div class="message-subject-row">
            <h1 class="message-subject">{{ $message->subject }}</h1>
            @if(!$message->is_read)
                <span class="message-status-badge new">
                    <i class="bi bi-circle-fill"></i>
                    New
                </span>
            @else
                <span class="message-status-badge read">
                    <i class="bi bi-check-circle-fill"></i>
                    Read
                </span>
            @endif
        </div>
        <div class="message-meta">
            <i class="bi bi-calendar-event"></i>
            Received on {{ $message->created_at->format('l, d F Y') }} at {{ $message->created_at->format('H:i') }}
        </div>
    </div>

    <!-- Sender Section -->
    <div class="sender-section">
        <div class="sender-card">
            <div class="sender-avatar-large">
                {{ strtoupper(substr($message->name, 0, 1)) }}
            </div>
            <div class="sender-info-large">
                <h2 class="sender-name-large">{{ $message->name }}</h2>
                <div class="sender-contacts">
                    <a href="mailto:{{ $message->email }}" class="contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        {{ $message->email }}
                    </a>
                    @if($message->phone)
                        <a href="tel:{{ $message->phone }}" class="contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            {{ $message->phone }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Message Content -->
    <div class="message-content-section">
        <div class="content-label">
            <i class="bi bi-chat-left-text-fill"></i>
            Message Content
        </div>
        <div class="message-body">{{ $message->message }}</div>
    </div>

    <!-- Action Buttons -->
    <div class="action-section">
        <div class="action-buttons-row">
            <!-- Reply via Email -->
            <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}" class="btn-primary-action">
                <i class="bi bi-reply-fill"></i>
                Reply via Email
            </a>

            <!-- Call (if phone exists) -->
            @if($message->phone)
                <a href="tel:{{ $message->phone }}" class="btn-secondary-action green">
                    <i class="bi bi-telephone-fill"></i>
                    Call {{ $message->name }}
                </a>
            @endif

            <!-- WhatsApp (if phone exists) -->
            @if($message->phone)
                @php
                    $cleanPhone = preg_replace('/[^0-9]/', '', $message->phone);
                    if(substr($cleanPhone, 0, 1) == '0') {
                        $cleanPhone = '62' . substr($cleanPhone, 1);
                    }
                    $whatsappMessage = urlencode("Hello {$message->name}, thank you for contacting us. Regarding: {$message->subject}");
                @endphp
                <a href="https://wa.me/{{ $cleanPhone }}?text={{ $whatsappMessage }}" target="_blank" class="btn-secondary-action emerald">
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>
            @endif

            <!-- Mark as Read (if unread) -->
            @if(!$message->is_read)
                <form method="POST" action="{{ route('admin.messages.mark-as-read', $message) }}" style="display: contents;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-mark-read">
                        <i class="bi bi-check-circle-fill"></i>
                        Mark as Read
                    </button>
                </form>
            @endif

            <!-- Delete -->
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Are you sure you want to delete this message?');" style="display: contents;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger-action">
                    <i class="bi bi-trash-fill"></i>
                    Delete Message
                </button>
            </form>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <div class="info-box-icon">
                <i class="bi bi-lightbulb-fill"></i>
            </div>
            <div class="info-box-content">
                <h4>Quick Tip</h4>
                <p>When replying to customers, ensure you address their concerns professionally and promptly. Consider creating email templates for common inquiries to save time.</p>
            </div>
        </div>
    </div>
</div>
@endsection