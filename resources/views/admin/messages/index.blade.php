@extends('admin.layouts.app')
@section('title', 'Inbox')
@section('header_title', 'Inbox Messages')
@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                    <tr class="{{ !$msg->is_read ? 'fw-bold bg-light' : '' }}">
                        <td>{{ $msg->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $msg->name }}<br><small class="text-muted">{{ $msg->email }}</small></td>
                        <td>{{ $msg->subject }}</td>
                        <td>
                            @if(!$msg->is_read) <span class="badge bg-danger">New</span> @else <span class="badge bg-secondary">Read</span> @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No messages yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $messages->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection