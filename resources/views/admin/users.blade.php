@extends('admin.layouts.app')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">Manage Users</h4>
            <p class="text-muted mb-0">Total {{ $users->total() }} registered users</p>
        </div>
        <div>
            <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#userModal" onclick="resetUserModal()">
                <i class="fas fa-plus me-1"></i> Add New User
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
            </a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="8%">Photo</th>
                            <th width="15%">Name</th>
                            <th width="20%">Email</th>
                            <th width="12%">Phone</th>
                            <th width="10%">City</th>
                            <th width="10%">Role</th>
                            <th width="10%">Joined</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        @foreach($users as $user)
                        <tr id="user-row-{{ $user->id }}">
                            <td>{{ $user->id }}</td>
                            <td>
                                <img src="{{ ($user->profile_image && file_exists(public_path($user->profile_image))) ? asset($user->profile_image) : asset('assets/images/dummy.jpg') }}" 
                                     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '-' }}</td>
                            <td>{{ $user->city ?? '-' }}</td>
                            <td>
                                <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" onchange="this.form.submit()" class="form-select form-select-sm" style="width: 85px;" {{ $user->id == auth()->id() ? 'disabled' : '' }}>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="editUser({{ $user->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @if($user->id != auth()->id())
                                <button class="btn btn-sm btn-danger delete-user" data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- User Modal (Create/Edit/Delete) -->
<div class="modal fade" id="userModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="userModalTitle">Add New User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" onclick="resetUserModal()"></button>
            </div>
            <form id="userForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="userMethodField" value="POST">
                <input type="hidden" name="user_id" id="userId">
                
                <div class="modal-body">
                    <div id="userDeleteMessage" style="display: none;" class="alert alert-danger mb-3"></div>
                    
                    <div id="userFormFields">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="userFirstName" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="userLastName" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="userName" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select name="gender" id="userGender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="userEmail" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone (11 digits) <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="userPhone" class="form-control" placeholder="03XXXXXXXXX" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CNIC (Optional)</label>
                                <input type="text" name="cnic" id="userCnic" class="form-control" placeholder="12345-1234567-1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="userDob" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="city" id="userCity" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" id="userCountry" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" id="userRole" class="form-control">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3" id="userPasswordFields">
                                <label class="form-label">Password <span class="text-danger" id="userPasswordRequired">*</span></label>
                                <input type="password" name="password" id="userPassword" class="form-control">
                                <small class="text-muted" id="userPasswordHelp">Leave blank to keep same password (for edit)</small>
                            </div>
                            <div class="col-md-6 mb-3" id="userConfirmPasswordFields">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="userPasswordConfirm" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" id="userImage" class="form-control" accept="image/*">
                                <div id="userCurrentImageDiv" style="display: none;" class="mt-2">
                                    <small>Current Image:</small>
                                    <img id="userCurrentImage" src="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-top: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetUserModal()">Cancel</button>
                    <button type="submit" class="btn btn-success" id="userSubmitBtn">Save User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let isUserDeleteMode = false;
let userDeleteId = null;

function resetUserModal() {
    isUserDeleteMode = false;
    userDeleteId = null;
    document.getElementById('userModalTitle').innerText = 'Add New User';
    document.getElementById('userMethodField').value = 'POST';
    document.getElementById('userForm').action = "{{ route('admin.users.store') }}";
    document.getElementById('userDeleteMessage').style.display = 'none';
    document.getElementById('userFormFields').style.display = 'block';
    document.getElementById('userSubmitBtn').innerText = 'Save User';
    document.getElementById('userSubmitBtn').className = 'btn btn-success';
    document.getElementById('userPasswordRequired').innerText = '*';
    document.getElementById('userPasswordHelp').style.display = 'block';
    document.getElementById('userPasswordFields').style.display = 'block';
    document.getElementById('userConfirmPasswordFields').style.display = 'block';
    
    // Clear form
    document.getElementById('userFirstName').value = '';
    document.getElementById('userLastName').value = '';
    document.getElementById('userName').value = '';
    document.getElementById('userEmail').value = '';
    document.getElementById('userPhone').value = '';
    document.getElementById('userCnic').value = '';
    document.getElementById('userGender').value = '';
    document.getElementById('userDob').value = '';
    document.getElementById('userCity').value = '';
    document.getElementById('userCountry').value = '';
    document.getElementById('userRole').value = 'user';
    document.getElementById('userPassword').value = '';
    document.getElementById('userPasswordConfirm').value = '';
    document.getElementById('userImage').value = '';
    document.getElementById('userCurrentImageDiv').style.display = 'none';
}

function editUser(id) {
    resetUserModal();
    isUserDeleteMode = false;
    document.getElementById('userModalTitle').innerText = 'Edit User';
    document.getElementById('userMethodField').value = 'PUT';
    document.getElementById('userForm').action = "{{ url('admin/users') }}/" + id;
    document.getElementById('userId').value = id;
    document.getElementById('userPasswordRequired').innerText = '';
    document.getElementById('userPasswordHelp').innerText = 'Leave blank to keep same password';
    
    // Fetch user data via AJAX
    $.ajax({
        url: "{{ url('admin/users') }}/" + id + "/edit",
        type: 'GET',
        success: function(response) {
            if (response.user) {
                document.getElementById('userFirstName').value = response.user.first_name || '';
                document.getElementById('userLastName').value = response.user.last_name || '';
                document.getElementById('userName').value = response.user.name || '';
                document.getElementById('userEmail').value = response.user.email || '';
                document.getElementById('userPhone').value = response.user.phone || '';
                document.getElementById('userCnic').value = response.user.cnic || '';
                document.getElementById('userGender').value = response.user.gender || '';
                document.getElementById('userDob').value = response.user.dob || '';
                document.getElementById('userCity').value = response.user.city || '';
                document.getElementById('userCountry').value = response.user.country || '';
                document.getElementById('userRole').value = response.user.role || 'user';
                
                if (response.user.profile_image) {
                    document.getElementById('userCurrentImage').src = response.user.profile_image.startsWith('http') ? response.user.profile_image : "{{ asset('') }}" + response.user.profile_image;
                    document.getElementById('userCurrentImageDiv').style.display = 'block';
                }
            }
        },
        error: function() {
            toastr.error('Failed to load user data');
        }
    });
    
    $('#userModal').modal('show');
}

// Delete user function
$('.delete-user').click(function() {
    let userId = $(this).data('id');
    let userName = $(this).data('name');
    let $row = $('#user-row-' + userId);
    
    Swal.fire({
        title: 'Delete User?',
        html: `Are you sure you want to delete <strong>${userName}</strong>?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Yes, delete!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/users') }}/" + userId,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $row.fadeOut(300, function() { $(this).remove(); });
                        // Update count
                        let count = parseInt($('.text-muted').first().text().match(/\d+/)[0]);
                        $('.text-muted').first().text('Total ' + (count - 1) + ' registered users');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    toastr.error('Failed to delete user');
                }
            });
        }
    });
});

// Handle form submission
document.getElementById('userForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let formData = new FormData(this);
    let url = this.action;
    let method = document.getElementById('userMethodField').value;
    
    if (method === 'PUT') {
        formData.append('_method', 'PUT');
    }
    
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.status === 'success') {
                toastr.success('User saved successfully!');
                $('#userModal').modal('hide');
                setTimeout(() => { location.reload(); }, 1000);
            } else {
                toastr.error(response.message || 'Failed to save user');
            }
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let errorMsg = '';
                for (let key in errors) {
                    errorMsg += errors[key][0] + '\n';
                }
                toastr.error(errorMsg);
            } else {
                toastr.error('Failed to save user');
            }
        }
    });
});
</script>
@endsection