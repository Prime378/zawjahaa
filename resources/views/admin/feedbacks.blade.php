@extends('admin.layouts.app')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">User Feedbacks</h4>
            <p class="text-muted mb-0">Total {{ $feedbacks->total() }} feedbacks</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
        </a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">User</th>
                            <th width="45%">Message</th>
                            <th width="15%">Date</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                        <tr id="feedback-row-{{ $feedback->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ ($feedback->user && $feedback->user->profile_image && file_exists(public_path($feedback->user->profile_image))) ? asset($feedback->user->profile_image) : asset('assets/images/dummy.jpg') }}" 
                                         style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                    <div>
                                        <div class="fw-semibold">{{ $feedback->user->name ?? 'Unknown' }}</div>
                                        <div class="text-muted small">{{ $feedback->user->email ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ Str::limit($feedback->message ?? $feedback->feedback ?? '-', 150) }}</td>
                            <td>
                                <div>{{ $feedback->created_at->format('d M Y') }}</div>
                                <div class="text-muted small">{{ $feedback->created_at->diffForHumans() }}</div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger delete-feedback" data-id="{{ $feedback->id }}">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $feedbacks->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.delete-feedback').click(function() {
        let feedbackId = $(this).data('id');
        let $row = $('#feedback-row-' + feedbackId);
        
        Swal.fire({
            title: 'Delete Feedback?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Yes, delete!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/feedbacks/" + feedbackId,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            $row.fadeOut(300, function() { $(this).remove(); });
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function() {
                        toastr.error('Failed to delete feedback');
                    }
                });
            }
        });
    });
});
</script>
@endsection