@extends('layouts.root')
@section('title', 'Device Stats')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Device Stats</h1>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users by Device Group</h5>

                @if(count($devices) > 0)
                <div class="row mt-4">
                    <div class="col-md-6">
                        <canvas id="barChart" style="max-width: 400px; max-height: 400px;"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="devicePieChart" style="max-width: 400px; max-height: 400px;"></canvas>
                    </div>
                </div>

                <table class="table table-bordered mt-4">
                    <thead>
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
                @else
                <p class="text-muted">No device data available.</p>
                @endif
            </div>
        </div>

        {{-- Filter / Search for detailed devices --}}
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Detailed Device List</h5>

                <form method="GET" action="{{ route('device.stats') }}" class="mb-3 row g-2">
                    <div class="col-md-3">
                        <input type="text" name="user_id" value="{{ request('user_id') }}" placeholder="Search User ID" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="device" value="{{ request('device') }}" placeholder="Search Device" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('device.stats') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>

                @if(count($deviceList) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Device</th>
                                <th>Accessed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deviceList as $index => $session)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $session->user_id }}</td>
                                <td>{{ $session->device ?? 'Unknown' }}</td>
                                <td>{{ $session->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">No detailed device data available.</p>
                @endif
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($labels);
    const data = @json($data);

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
                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#6f42c1', '#20c997', '#fd7e14'
                ],
                borderColor: '#4e73df',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'y', // horizontal
            maintainAspectRatio: false,
            scales: {
                x: { beginAtZero: true, ticks: { stepSize: 1 } }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + ' users';
                        }
                    }
                }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('devicePieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($devices->pluck('device_group')) !!},
            datasets: [{
                data: {!! json_encode($devices->pluck('user_count')) !!},
                backgroundColor: [
                    '#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1', '#20c997', '#fd7e14', '#6610f2'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection
