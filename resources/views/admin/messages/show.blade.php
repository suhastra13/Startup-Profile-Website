@extends('admin.layouts.app')
@section('title', 'Read Message')
@section('header_title', 'Read Message')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $message->subject }}</h5>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>From:</strong> {{ $message->name }} ({{ $message->email }})<br>
                <strong>Phone:</strong> {{ $message->phone ?? '-' }}
            </div>
            <div class="col-md-6 text-end text-muted">
                {{ $message->created_at->format('d F Y, H:i') }}
            </div>
        </div>
        <hr>
        <div class="p-3 bg-light rounded">
            {{ $message->message }}
        </div>
        <div class="mt-4">
            <a href="mailto:{{ $message->email }}" class="btn btn-primary"><i class="bi bi-reply"></i> Reply via Email</a>
        </div>
    </div>
</div>
@endsection