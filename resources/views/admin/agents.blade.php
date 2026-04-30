@extends('admin.layouts.app')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">Manage Agents</h4>
            <p class="text-muted mb-0">Total {{ $agents->total() }} agents</p>
        </div>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#agentModal" onclick="resetAgentModal()">
            <i class="fas fa-plus me-1"></i> Add New Agent
        </button>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">Photo</th>
                            <th width="20%">Name</th>
                            <th width="25%">Email</th>
                            <th width="10%">Gender</th>
                            <th width="15%">Phone</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="agentsTableBody">
                        @foreach($agents as $agent)
                        <tr id="agent-row-{{ $agent->id }}">
                            <td>{{ $agent->id }}</td>
                            <td>
                                <img src="{{ ($agent->profile_image && file_exists(public_path($agent->profile_image))) ? asset($agent->profile_image) : asset('assets/images/dummy.jpg') }}" 
                                     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                            </td>
                            <td>{{ $agent->name }}</td>
                            <td>{{ $agent->email }}</td>
                            <td>
                                <span class="badge {{ $agent->gender == 'male' ? 'bg-primary' : 'bg-danger' }}">
                                    {{ ucfirst($agent->gender) }}
                                </span>
                            </td>
                            <td>{{ $agent->phone ?? '-' }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="editAgent({{ $agent->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteAgent({{ $agent->id }}, '{{ $agent->name }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $agents->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Agent Modal -->
<div class="modal fade" id="agentModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalTitle">Add New Agent</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" onclick="resetAgentModal()"></button>
            </div>
            <form id="agentForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="methodField" value="POST">
                <input type="hidden" name="agent_id" id="agentId">
                
                <div class="modal-body">
                    <div id="deleteMessage" style="display: none;" class="alert alert-danger mb-3"></div>
                    
                    <div id="formFields">
                        <div class="mb-3">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="agentName" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="agentEmail" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" id="agentPhone" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" id="agentGender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        
                        <div class="mb-3" id="passwordFields">
                            <label class="form-label">Password <span class="text-danger" id="passwordRequired">*</span></label>
                            <input type="password" name="password" id="agentPassword" class="form-control">
                            <small class="text-muted" id="passwordHelp">Leave blank to keep same password (for edit)</small>
                        </div>
                        
                        <div class="mb-3" id="confirmPasswordFields">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="agentPasswordConfirm" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Profile Image</label>
                            <input type="file" name="profile_image" id="agentImage" class="form-control" accept="image/*">
                            <div id="currentImageDiv" style="display: none;" class="mt-2">
                                <small>Current Image:</small>
                                <img id="currentImage" src="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-top: 5px;">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetAgentModal()">Cancel</button>
                    <button type="submit" class="btn btn-success" id="submitBtn">Save Agent</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let isDeleteMode = false;
let deleteId = null;

function resetAgentModal() {
    isDeleteMode = false;
    deleteId = null;
    document.getElementById('modalTitle').innerText = 'Add New Agent';
    document.getElementById('methodField').value = 'POST';
    document.getElementById('deleteMessage').style.display = 'none';
    document.getElementById('formFields').style.display = 'block';
    document.getElementById('submitBtn').innerText = 'Save Agent';
    document.getElementById('submitBtn').className = 'btn btn-success';
    document.getElementById('passwordRequired').innerText = '*';
    document.getElementById('passwordHelp').style.display = 'block';
    document.getElementById('passwordFields').style.display = 'block';
    document.getElementById('confirmPasswordFields').style.display = 'block';
    
    // Clear form
    document.getElementById('agentName').value = '';
    document.getElementById('agentEmail').value = '';
    document.getElementById('agentPhone').value = '';
    document.getElementById('agentGender').value = '';
    document.getElementById('agentPassword').value = '';
    document.getElementById('agentPasswordConfirm').value = '';
    document.getElementById('agentImage').value = '';
    document.getElementById('currentImageDiv').style.display = 'none';
}

function editAgent(id) {
    resetAgentModal();
    isDeleteMode = false;
    document.getElementById('modalTitle').innerText = 'Edit Agent';
    document.getElementById('methodField').value = 'PUT';
    document.getElementById('agentId').value = id;
    document.getElementById('passwordRequired').innerText = '';
    document.getElementById('passwordHelp').innerText = 'Leave blank to keep same password';
    
    $.ajax({
        url: "{{ url('admin/agents/get') }}/" + id,
        type: 'GET',
        success: function(response) {
            if (response.agent) {
                document.getElementById('agentName').value = response.agent.name || '';
                document.getElementById('agentEmail').value = response.agent.email || '';
                document.getElementById('agentPhone').value = response.agent.phone || '';
                document.getElementById('agentGender').value = response.agent.gender || '';
                
                if (response.agent.profile_image) {
                    let imgSrc = response.agent.profile_image.startsWith('http') ? response.agent.profile_image : "{{ asset('') }}" + response.agent.profile_image;
                    document.getElementById('currentImage').src = imgSrc;
                    document.getElementById('currentImageDiv').style.display = 'block';
                }
            }
        },
        error: function() {
            toastr.error('Failed to load agent data');
        }
    });
    
    $('#agentModal').modal('show');
}

function deleteAgent(id, name) {
    isDeleteMode = true;
    deleteId = id;
    document.getElementById('modalTitle').innerText = 'Delete Agent';
    document.getElementById('deleteMessage').style.display = 'block';
    document.getElementById('formFields').style.display = 'none';
    document.getElementById('submitBtn').innerText = 'Confirm Delete';
    document.getElementById('submitBtn').className = 'btn btn-danger';
    document.getElementById('deleteMessage').innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i> Are you sure you want to delete <strong>' + name + '</strong>? This action cannot be undone!';
    
    $('#agentModal').modal('show');
}

// Handle form submission
document.getElementById('agentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (isDeleteMode) {
        $.ajax({
            url: "{{ url('admin/agents') }}/" + deleteId,
            type: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    $('#agentModal').modal('hide');
                    setTimeout(() => { location.reload(); }, 1000);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('Failed to delete agent');
            }
        });
    } else {
        
       let formData = new FormData(this);
let method = document.getElementById('methodField').value;
let id = document.getElementById('agentId').value;

let url = "{{ url('admin/agents') }}";

if (method === 'PUT') {
    url = "{{ url('admin/agents') }}/" + id;
    formData.append('_method', 'PUT');
}

formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        
      $.ajax({
    url: url,
    type: 'POST',
    data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    $('#agentModal').modal('hide');
                    setTimeout(() => { location.reload(); }, 1000);
                } else {
                    toastr.error(response.message || 'Failed to save agent');
                }
            },
            error: function(xhr) {
    console.log(xhr.status);
    console.log(xhr.responseText);

    if (xhr.responseJSON && xhr.responseJSON.message) {
        toastr.error(xhr.responseJSON.message);
    }
    else if (xhr.responseJSON && xhr.responseJSON.errors) {
        let errors = xhr.responseJSON.errors;
        let msg = '';

        for (let key in errors) {
            msg += errors[key][0] + '\n';
        }

        toastr.error(msg);
    }
    else {
        toastr.error(xhr.responseText || 'Server Error');
    }
}
        });
    }
});
</script>
@endsection