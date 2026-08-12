@extends('layouts.root')

@section('title', 'Device Stats')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Device Statistics</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Device Stats</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Sessions</h5>
                        <h2 class="text-primary">{{ $deviceList->total() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Unique Devices</h5>
                        <h2 class="text-success">{{ $devices->count() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Most Common</h5>
                        <h2 class="text-warning">{{ $devices->first()->device_group ?? 'N/A' }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grouped Stats -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users by Device Group</h5>

                @if($devices->count() > 0)
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <canvas id="barChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="devicePieChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Device Group</th>
                                    <th>User Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($devices as $index => $device)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $device->device_group ?? 'Unknown' }}</td>
                                    <td>{{ $device->user_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mt-3">No device data available yet.</div>
                @endif
            </div>
        </div>

        <!-- Detailed Device List -->
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Detailed Device Sessions</h5>

                <!-- Filters -->
                <form method="GET" action="{{ route('reports.device-stats') }}" class="row g-2 mb-3">
                    <div class="col-md-3">
                        <input type="text" name="user_id" value="{{ request('user_id') }}" placeholder="Filter by User ID" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="device" value="{{ request('device') }}" placeholder="Filter by Device" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Filter</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('reports.device-stats') }}" class="btn btn-secondary w-100"><i class="bi bi-arrow-counterclockwise"></i> Reset</a>
                    </div>
                </form>

                @if($deviceList->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User ID</th>
                                    <th>Device</th>
                                    <th>Login Time</th>
                                    <th>Duration (sec)</th>
                                    <th>Action</th>  <!-- NEW COLUMN -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deviceList as $index => $session)
                                <tr>
                                    <td>{{ $deviceList->firstItem() + $index }}</td>
                                    <td>{{ $session->user_id }}</td>
                                    <td>{{ $session->device ?? 'Unknown' }}</td>
                                    <td>{{ $session->login_time ? \Carbon\Carbon::parse($session->login_time)->format('d M Y, H:i:s') : 'N/A' }}</td>
                                    <td>{{ $session->duration ?? '—' }}</td>
                                    <td>
                                        <form action="{{ route('user-sessions.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this session?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete Session">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted small">
                            Showing {{ $deviceList->firstItem() }} to {{ $deviceList->lastItem() }} of {{ $deviceList->total() }} results
                        </div>
                        <div>
                            {{ $deviceList->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">No detailed device data found.</div>
                @endif
            </div>
        </div>

    </section>
</main>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const labels = @json($labels);
        const data = @json($data);

        if (labels.length > 0) {
            // Horizontal Bar Chart
            const barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'User Count',
                        data: data,
                        backgroundColor: [
                            '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e',
                            '#e74a3b', '#6f42c1', '#20c997', '#fd7e14'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });

            // Pie Chart
            const pieCtx = document.getElementById('devicePieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            '#007bff', '#28a745', '#ffc107', '#dc3545',
                            '#6f42c1', '#20c997', '#fd7e14', '#6610f2'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        } else {
            document.getElementById('barChart').parentElement.innerHTML = '<p class="text-muted">No chart data available.</p>';
            document.getElementById('devicePieChart').parentElement.innerHTML = '<p class="text-muted">No chart data available.</p>';
        }
    });
</script>
@endsection
