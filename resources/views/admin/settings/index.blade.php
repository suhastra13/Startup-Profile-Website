@extends('admin.layouts.app')
@section('title', 'Site Settings')
@section('header_title', 'General Settings')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf

                    <h6 class="text-primary mb-3">Contact Information</h6>
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label>Official Email</label>
                        <input type="email" name="site_email" class="form-control" value="{{ $settings['site_email'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="site_phone" class="form-control" value="{{ $settings['site_phone'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="site_address" class="form-control" rows="2">{{ $settings['site_address'] ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Google Maps Embed (src URL only)</label>
                        <input type="text" name="google_maps_embed" class="form-control" value="{{ $settings['google_maps_embed'] ?? '' }}">
                        <div class="form-text">Copy only the URL inside src="..." from Google Maps embed code.</div>
                    </div>

                    <h6 class="text-primary mt-4 mb-3">Social Media</h6>
                    <div class="mb-3">
                        <label>Instagram URL</label>
                        <input type="url" name="social_instagram" class="form-control" value="{{ $settings['social_instagram'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label>LinkedIn URL</label>
                        <input type="url" name="social_linkedin" class="form-control" value="{{ $settings['social_linkedin'] ?? '' }}">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection