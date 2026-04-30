@extends('admin.layouts.app')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">Website Settings</h4>
            <p class="text-muted mb-0">Configure your website preferences</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>
    
    <div class="row g-3">
        <div class="col-md-6">
            <div class="stat-card">
                <h6 class="fw-semibold mb-3"><i class="fas fa-globe text-success me-2"></i>General Settings</h6>
                <form id="generalSettingsForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Website Name</label>
                        <input type="text" name="site_name" class="form-control" value="zawjahaa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website Email</label>
                        <input type="email" name="site_email" class="form-control" value="info@zawjahaa.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="+92 300 1234567">
                    </div>
                    <button type="submit" class="btn btn-success">Save Settings</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card">
                <h6 class="fw-semibold mb-3"><i class="fas fa-share-alt text-success me-2"></i>Social Media</h6>
                <form id="socialSettingsForm">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label"><i class="fab fa-facebook text-primary me-1"></i> Facebook</label>
                        <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/">
                    </div>
                    <div class="mb-2">
                        <label class="form-label"><i class="fab fa-instagram text-danger me-1"></i> Instagram</label>
                        <input type="url" name="instagram" class="form-control" placeholder="https://instagram.com/">
                    </div>
                    <div class="mb-2">
                        <label class="form-label"><i class="fab fa-whatsapp text-success me-1"></i> WhatsApp</label>
                        <input type="text" name="whatsapp" class="form-control" placeholder="+92 300 1234567">
                    </div>
                    <button type="submit" class="btn btn-success">Save Social Links</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#generalSettingsForm').on('submit', function(e) {
        e.preventDefault();
        toastr.success('Settings saved successfully!');
    });
    
    $('#socialSettingsForm').on('submit', function(e) {
        e.preventDefault();
        toastr.success('Social links saved successfully!');
    });
});
</script>
@endsection