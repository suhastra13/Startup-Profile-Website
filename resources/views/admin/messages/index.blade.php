@extends('admin.layouts.app')

@section('title', 'Inbox')
@section('header_title', 'Inbox Messages')

@push('styles')
<style>
    /* ============================================
       INBOX MESSAGES - CORAL THEME
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

    /* Stats Cards */
    .stats-row {
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .stat-card.total::before {
        background: linear-gradient(180deg, var(--coral), var(--coral-dark));
    }

    .stat-card.unread::before {
        background: linear-gradient(180deg, #EF4444, #DC2626);
    }

    .stat-card.read::before {
        background: linear-gradient(180deg, #10B981, #059669);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .stat-card-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .stat-card-icon.total {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        color: var(--coral);
    }

    .stat-card-icon.unread {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
        color: #EF4444;
    }

    .stat-card-icon.read {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
        color: #10B981;
    }

    .stat-card-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--navy);
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-card-label {
        font-size: 0.875rem;
        color: var(--gray-600);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

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
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
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

    /* Filter Section */
    .filter-section {
        background: var(--gray-50);
        padding: 1.5rem;
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
        margin-bottom: 2rem;
    }

    .filter-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.5rem;
        display: block;
    }

    .modern-select,
    .modern-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--gray-300);
        border-radius: 0.5rem;
        font-size: 0.9375rem;
        color: var(--gray-700);
        transition: all 0.2s ease;
        background: white;
    }

    .modern-select:focus,
    .modern-input:focus {
        outline: none;
        border-color: var(--coral);
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.1);
    }

    .modern-input::placeholder {
        color: var(--gray-400);
    }

    .btn-filter {
        background: white;
        color: var(--gray-700);
        border: 1.5px solid var(--gray-300);
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-filter:hover {
        background: var(--gray-50);
        border-color: var(--gray-400);
        color: var(--gray-900);
    }

    .btn-reset {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: 1.5px solid rgba(239, 68, 68, 0.2);
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-reset:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: #EF4444;
        color: #EF4444;
    }

    /* Table Styles */
    .modern-table-wrapper {
        border-radius: 0.75rem;
        overflow: hidden;
        border: 1.5px solid var(--gray-200);
    }

    .modern-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .modern-table thead {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 107, 107, 0.02));
    }

    .modern-table thead th {
        padding: 1rem 1.25rem;
        font-weight: 700;
        font-size: 0.875rem;
        color: var(--navy);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 2px solid var(--gray-200);
        white-space: nowrap;
    }

    .modern-table tbody td {
        padding: 1.25rem 1.25rem;
        color: var(--gray-700);
        font-size: 0.9375rem;
        border-bottom: 1px solid var(--gray-100);
        vertical-align: middle;
    }

    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }

    .modern-table tbody tr {
        transition: all 0.2s ease;
    }

    .modern-table tbody tr:hover {
        background: var(--gray-50);
    }

    .modern-table tbody tr.unread {
        background: rgba(255, 107, 107, 0.03);
        border-left: 4px solid var(--coral);
    }

    .modern-table tbody tr.unread:hover {
        background: rgba(255, 107, 107, 0.05);
    }

    /* Date Cell */
    .date-cell {
        color: var(--gray-600);
        font-size: 0.875rem;
        font-weight: 500;
        white-space: nowrap;
    }

    .date-cell i {
        color: var(--coral);
        margin-right: 0.375rem;
    }

    /* Sender Info */
    .sender-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .sender-avatar {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, var(--coral), var(--coral-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.875rem;
        flex-shrink: 0;
    }

    .sender-details {
        flex: 1;
        min-width: 0;
    }

    .sender-name {
        font-weight: 700;
        color: var(--navy);
        font-size: 0.9375rem;
        margin-bottom: 0.125rem;
    }

    .sender-email {
        font-size: 0.8125rem;
        color: var(--gray-500);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Subject */
    .message-subject {
        font-weight: 600;
        color: var(--gray-900);
    }

    .message-preview {
        font-size: 0.8125rem;
        color: var(--gray-500);
        margin-top: 0.25rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .status-badge.new {
        background: rgba(239, 68, 68, 0.1);
        color: #DC2626;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .status-badge.read {
        background: rgba(107, 114, 128, 0.1);
        color: var(--gray-600);
        border: 1px solid rgba(107, 114, 128, 0.2);
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: nowrap;
    }

    .btn-action {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        flex-shrink: 0;
    }

    .btn-action.view {
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
        border: 1.5px solid rgba(59, 130, 246, 0.2);
    }

    .btn-action.view:hover {
        background: rgba(59, 130, 246, 0.15);
        border-color: #3B82F6;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(59, 130, 246, 0.2);
    }

    .btn-action.delete {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: 1.5px solid rgba(239, 68, 68, 0.2);
    }

    .btn-action.delete:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: #EF4444;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(239, 68, 68, 0.2);
    }

    /* Empty State */
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
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 0.5rem;
    }

    .empty-state-text {
        color: var(--gray-600);
        margin-bottom: 1.5rem;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: flex-end;
    }

    /* Mobile Card View */
    .message-card-mobile {
        display: none;
        background: white;
        border-radius: 0.75rem;
        border: 1.5px solid var(--gray-200);
        padding: 1.25rem;
        margin-bottom: 1rem;
        transition: all 0.2s ease;
    }

    .message-card-mobile.unread {
        background: rgba(255, 107, 107, 0.03);
        border-left: 4px solid var(--coral);
    }

    .message-card-mobile:hover {
        border-color: var(--coral);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.1);
    }

    .message-card-header-mobile {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1.5px solid var(--gray-100);
    }

    .message-card-body-mobile {
        display: flex;
        flex-direction: column;
        gap: 0.875rem;
    }

    .message-card-row-mobile {
        display: flex;
        justify-content: space-between;
        align-items: start;
        gap: 1rem;
    }

    .message-card-label-mobile {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        white-space: nowrap;
    }

    .message-card-value-mobile {
        font-weight: 600;
        color: var(--gray-700);
        text-align: right;
    }

    .message-card-actions-mobile {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1.5px solid var(--gray-100);
        display: flex;
        gap: 0.5rem;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .modern-card-header {
            padding: 1.25rem 1.5rem;
        }

        .modern-card-body {
            padding: 1.5rem;
        }

        .stats-row {
            margin-bottom: 1.5rem;
        }

        .stat-card {
            padding: 1.25rem;
            margin-bottom: 1rem;
        }

        .stat-card-value {
            font-size: 1.75rem;
        }

        .filter-section {
            padding: 1.25rem;
        }

        /* Hide table, show cards */
        .modern-table-wrapper {
            display: none;
        }

        .message-card-mobile {
            display: block;
        }

        .action-buttons {
            flex: 1;
        }

        .btn-action {
            flex: 1;
        }
    }

    @media (max-width: 576px) {
        .stat-card-value {
            font-size: 1.5rem;
        }

        .stat-card-label {
            font-size: 0.75rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Stats Row -->
<div class="row stats-row">
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="stat-card total">
            <div class="stat-card-icon total">
                <i class="bi bi-envelope-fill"></i>
            </div>
            <div class="stat-card-value">{{ $messages->total() }}</div>
            <div class="stat-card-label">Total Messages</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="stat-card unread">
            <div class="stat-card-icon unread">
                <i class="bi bi-envelope-exclamation-fill"></i>
            </div>
            <div class="stat-card-value">{{ $messages->where('is_read', false)->count() }}</div>
            <div class="stat-card-label">Unread</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="stat-card read">
            <div class="stat-card-icon read">
                <i class="bi bi-envelope-check-fill"></i>
            </div>
            <div class="stat-card-value">{{ $messages->where('is_read', true)->count() }}</div>
            <div class="stat-card-label">Read</div>
        </div>
    </div>
</div>

<!-- Main Card -->
<div class="modern-card">
    <div class="modern-card-header">
        <h5>
            <i class="bi bi-inbox-fill"></i>
            All Messages
        </h5>
    </div>

    <div class="modern-card-body">
        <!-- Filter Section -->
        <form action="{{ route('admin.messages.index') }}" method="GET" class="filter-section">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="filter-label">Status</label>
                    <select name="status" class="modern-select">
                        <option value="">All Messages</option>
                        <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Unread Only</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read Only</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="filter-label">Search</label>
                    <input
                        type="text"
                        name="search"
                        class="modern-input"
                        placeholder="Search by name, email, or subject..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <label class="filter-label">&nbsp;</label>
                    <button type="submit" class="btn-filter">
                        <i class="bi bi-funnel-fill"></i>
                        Filter
                    </button>
                </div>
                <div class="col-md-2">
                    <label class="filter-label">&nbsp;</label>
                    <a href="{{ route('admin.messages.index') }}" class="btn-reset">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </a>
                </div>
            </div>
        </form>

        <!-- Table (Desktop View) -->
        @if($messages->count() > 0)
        <div class="modern-table-wrapper">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th style="width: 15%">Date</th>
                        <th style="width: 25%">From</th>
                        <th>Subject</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 12%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                    <tr class="{{ !$msg->is_read ? 'unread' : '' }}">
                        <td>
                            <div class="date-cell">
                                <i class="bi bi-calendar-event"></i>
                                {{ $msg->created_at->format('d M Y') }}
                                <br>
                                <small style="color: var(--gray-500);">{{ $msg->created_at->format('H:i') }}</small>
                            </div>
                        </td>
                        <td>
                            <div class="sender-info">
                                <div class="sender-avatar">
                                    {{ strtoupper(substr($msg->name, 0, 1)) }}
                                </div>
                                <div class="sender-details">
                                    <div class="sender-name">{{ $msg->name }}</div>
                                    <div class="sender-email">{{ $msg->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="message-subject">{{ $msg->subject }}</div>
                            @if($msg->message)
                            <div class="message-preview">{{ Str::limit($msg->message, 60) }}</div>
                            @endif
                        </td>
                        <td>
                            @if(!$msg->is_read)
                            <span class="status-badge new">
                                <i class="bi bi-circle-fill"></i>
                                New
                            </span>
                            @else
                            <span class="status-badge read">
                                <i class="bi bi-check-circle-fill"></i>
                                Read
                            </span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a
                                    href="{{ route('admin.messages.show', $msg->id) }}"
                                    class="btn-action view"
                                    title="View Message">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action delete" title="Delete Message">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="mobile-cards-container">
            @foreach($messages as $msg)
            <div class="message-card-mobile {{ !$msg->is_read ? 'unread' : '' }}">
                <div class="message-card-header-mobile">
                    <div class="sender-info">
                        <div class="sender-avatar">
                            {{ strtoupper(substr($msg->name, 0, 1)) }}
                        </div>
                        <div class="sender-details">
                            <div class="sender-name">{{ $msg->name }}</div>
                            <div class="sender-email">{{ $msg->email }}</div>
                        </div>
                    </div>
                    @if(!$msg->is_read)
                    <span class="status-badge new">
                        <i class="bi bi-circle-fill"></i>
                        New
                    </span>
                    @else
                    <span class="status-badge read">
                        <i class="bi bi-check-circle-fill"></i>
                        Read
                    </span>
                    @endif
                </div>

                <div class="message-card-body-mobile">
                    <div class="message-card-row-mobile">
                        <span class="message-card-label-mobile">Subject</span>
                        <div class="message-card-value-mobile" style="text-align: left; flex: 1;">
                            <div class="message-subject">{{ $msg->subject }}</div>
                        </div>
                    </div>

                    @if($msg->message)
                    <div class="message-card-row-mobile">
                        <span class="message-card-label-mobile">Preview</span>
                        <div class="message-card-value-mobile" style="text-align: left; flex: 1;">
                            <div class="message-preview">{{ Str::limit($msg->message, 50) }}</div>
                        </div>
                    </div>
                    @endif

                    <div class="message-card-row-mobile">
                        <span class="message-card-label-mobile">Date</span>
                        <div class="date-cell message-card-value-mobile">
                            <i class="bi bi-calendar-event"></i>
                            {{ $msg->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                </div>

                <div class="message-card-actions-mobile">
                    <a
                        href="{{ route('admin.messages.show', $msg->id) }}"
                        class="btn-action view"
                        title="View Message">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline" style="flex: 1;" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action delete" style="width: 100%;" title="Delete Message">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $messages->links('pagination::bootstrap-5') }}
        </div>

        @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-inbox"></i>
            </div>
            <h3 class="empty-state-title">No Messages Found</h3>
            <p class="empty-state-text">
                @if(request('search') || request('status'))
                No messages match your filter criteria. Try adjusting your search.
                @else
                Your inbox is empty. New messages will appear here.
                @endif
            </p>
            @if(request('search') || request('status'))
            <a href="{{ route('admin.messages.index') }}" class="btn-reset" style="display: inline-flex; width: auto;">
                <i class="bi bi-arrow-clockwise"></i>
                Clear Filters
            </a>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-submit form when status changes
        const statusSelect = document.querySelector('select[name="status"]');
        if (statusSelect) {
            statusSelect.addEventListener('change', function() {
                this.form.submit();
            });
        }

        // Highlight current filters
        const filterInputs = document.querySelectorAll('.filter-section input, .filter-section select');
        filterInputs.forEach(input => {
            if (input.value) {
                input.style.borderColor = 'var(--coral)';
                input.style.background = 'rgba(255, 107, 107, 0.05)';
            }
        });
    });
</script>
@endpush