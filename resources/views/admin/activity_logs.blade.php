@extends('admin.layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1">Activity Logs</h4>
                <p class="text-muted mb-0">Track all user activities and visits</p>
            </div>
            <div>
                <button class="btn btn-sm btn-danger me-2" onclick="confirmClearLogs()">
                    <i class="fas fa-trash-alt me-1"></i> Clear All
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-1 opacity-75">Total Visits</p>
                                <h3 class="fw-bold mb-0">{{ $totalVisits ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-eye fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-1 opacity-75">Unique Visitors</p>
                                <h3 class="fw-bold mb-0">{{ $uniqueVisitors ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-user-friends fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-1 opacity-75">Logged-in Users</p>
                                <h3 class="fw-bold mb-0">{{ $loggedInUsers ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-check-circle fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-1 opacity-75">Today's Visits</p>
                                <h3 class="fw-bold mb-0">{{ $todayVisits ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-calendar-day fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logs Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">User</th>
                                <th width="12%">IP</th>
                                <th width="10%">Browser</th>
                                <th width="10%">Device</th>
                                <th width="10%">Platform</th>
                                <th width="20%">Page</th>
                                <th width="8%">Status</th>
                                <th width="10%">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs ?? [] as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>
                                        @if($log->user_id)
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ ($log->user && $log->user->profile_image && file_exists(public_path($log->user->profile_image))) ? asset($log->user->profile_image) : asset('assets/images/dummy.jpg') }}"
                                                    style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
                                                <span>{{ $log->user->name ?? 'User-' . $log->user_id }}</span>
                                            </div>
                                        @else
                                            <span class="text-muted">Guest</span>
                                        @endif
                                    </td>
                                    <td><code>{{ $log->ip_address ?? '-' }}</code></td>
                                    <td>{{ $log->browser ?: '-' }}</td>
                                    <td>{{ $log->device ?: '-' }}</td>
                                    <td>{{ $log->platform ?: '-' }}</td>
                                    <td class="text-truncate" style="max-width: 200px;">{{ $log->visited_url ?: '-' }}</td>
                                    <td>
                                        @if($log->login_status)
                                            <span class="badge bg-success">Logged In</span>
                                        @else
                                            <span class="badge bg-secondary">Guest</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $log->created_at ? date('d M H:i', strtotime($log->created_at)) : '-' }}</div>
                                        <div class="text-muted small">
                                            {{ $log->created_at ? \Carbon\Carbon::parse($log->created_at)->diffForHumans() : '-' }}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <i class="fas fa-inbox fa-2x text-muted mb-2 d-block"></i>
                                        <p class="text-muted mb-0">No activity logs found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    @if(isset($logs) && method_exists($logs, 'links'))
                        {{ $logs->links('pagination::bootstrap-5') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmClearLogs() {
            Swal.fire({
                title: 'Clear All Logs?',
                text: "This will delete all activity logs permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Yes, clear all!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.activity-logs.clear') }}",
                        type: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function (response) {
                            if (response.status === 'success') {
                                toastr.success(response.message);
                                setTimeout(() => { location.reload(); }, 1000);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function () {
                            toastr.error('Failed to clear logs');
                        }
                    });
                }
            });
        }
    </script>
@endsection