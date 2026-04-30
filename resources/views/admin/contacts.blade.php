@extends('admin.layouts.app')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">Contact Queries</h4>
            <p class="text-muted mb-0">Total {{ $contacts->total() }} messages from users</p>
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
                            <th width="5%">ID</th>
                            <th width="15%">Name</th>
                            <th width="12%">Phone</th>
                            <th width="15%">Email</th>
                            <th width="10%">Looking For</th>
                            <th width="8%">Age</th>
                            <th width="10%">Location</th>
                            <th width="12%">Profession</th>
                            <th width="10%">Service</th>
                            <th width="20%">Message</th>
                            <th width="10%">Date</th>
                            <th width="8%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr id="contact-row-{{ $contact->id }}">
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->full_name ?? '-' }}</td>
                            <td>{{ $contact->phone ?? '-' }}</td>
                            <td>{{ $contact->email ?? '-' }}</td>
                            <td>{{ $contact->looking_for ?? '-' }}</td>
                            <td>{{ $contact->age ?? '-' }}</td>
                            <td>{{ $contact->location ?? '-' }}</td>
                            <td>{{ $contact->profession ?? '-' }}</td>
                            <td>{{ $contact->service ?? '-' }}</td>
                            <td>{{ Str::limit($contact->message ?? '-', 80) }}</td>
                            <td>{{ $contact->created_at ? $contact->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger delete-contact" data-id="{{ $contact->id }}" data-name="{{ $contact->full_name }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $contacts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- View Message Modal -->
<div class="modal fade" id="viewMessageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Contact Message Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="messageContent">
                <!-- Dynamic content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    // Delete Contact - FIXED
    $('.delete-contact').click(function() {
        let contactId = $(this).data('id');
        let contactName = $(this).data('name');
        let $row = $('#contact-row-' + contactId);
        
        Swal.fire({
            title: 'Delete Contact Query?',
            html: `Are you sure you want to delete message from <strong>${contactName}</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Yes, delete!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Deleting...',
                    text: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading(); }
                });
                
                $.ajax({
                    url: "{{ url('admin/contacts') }}/" + contactId,
                    type: 'DELETE',
                    data: { 
                        _token: '{{ csrf_token() }}' 
                    },
                    success: function(response) {
                        Swal.close();
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            $row.fadeOut(300, function() { $(this).remove(); });
                            // Update count if needed
                            let count = parseInt($('.text-muted').text().match(/\d+/)[0]);
                            $('.text-muted').text('Total ' + (count - 1) + ' messages from users');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        let errorMsg = 'Failed to delete contact';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        toastr.error(errorMsg);
                        console.error('Error:', xhr);
                    }
                });
            }
        });
    });
});
</script>
@endsection