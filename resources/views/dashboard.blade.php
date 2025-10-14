@extends('layouts.root')
@section('title', 'Admin Dashboard')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Admin Dashboard</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Info Cards -->
                        @php
                            $stats = [
                                [
                                    'title' => 'Resources',
                                    'count' => count($resources),
                                    'icon' => 'bi-book',
                                    'color' => 'white',
                                ],
                                [
                                    'title' => 'Notes',
                                    'count' => count($notes),
                                    'icon' => 'bi-files',
                                    'color' => 'white',
                                ],
                                [
                                    'title' => 'Users',
                                    'count' => count($users),
                                    'icon' => 'bi-people',
                                    'color' => 'white',
                                ],
                                [
                                    'title' => 'Subscribers',
                                    'count' => count($subscribers),
                                    'icon' => 'bi-person-check',
                                    'color' => 'white',
                                ],
                            ];
                        @endphp

                        @foreach ($stats as $stat)
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card text-dark bg-{{ $stat['color'] }} shadow-sm">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ Str::plural($stat['title'], $stat['count']) }}</h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light text-dark">
                                                <i class="bi {{ $stat['icon'] }}"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h3 class="mb-0">{{ $stat['count'] }}</h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <!-- End Info Cards -->

                        <!-- Online Users Card -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Online Users ({{ $onlineUsers->count() }})</h5>
                                    @if ($onlineUsers->count() > 0)
                                        <ul class="list-group">
                                            @foreach ($onlineUsers as $user)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $user->name }}
                                                    <span class="badge bg-success">Online</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted">No users online currently.</p>
                                    @endif
                                </div>
                            </div>
                        </div><!-- End Online Users Card -->

                        <!-- Recent Schools -->
                        <div class="col-12">
                            <div class="card recent-sales">
                                <div class="card-body">
                                    <h5 class="card-title">Recently Added Schools ({{ count($schools) }})</h5>

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Head Teacher</th>
                                                <th>Region</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($schools as $index => $school)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $school->name }}</td>
                                                    <td>{{ $school->headteacher_name }}</td>
                                                    <td>{{ $school->region->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Schools -->

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">
                    <!-- Materials Pie Chart -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Materials Overview</h5>
                            <div id="materialsChart" style="height: 400px;"></div>
                        </div>
                    </div><!-- End Materials Pie Chart -->

                    <!-- User Activity Bar Chart -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</h5>
                            <div id="userActivityChart" style="height: 400px;"></div>
                        </div>
                    </div><!-- End User Activity Bar Chart -->
                </div><!-- End Right side columns -->

            </div>
        </section>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // === INITIAL DATA FROM BLADE ===
            const initialMaterialsData = [{
                value: {{ count($resources) }},
                name: 'Resources'
            },
            {
                value: {{ count($notes) }},
                name: 'Notes'
            },
            {
                value: {{ count($users) }},
                name: 'Users'
            },
            {
                value: {{ count($subscribers) }},
                name: 'Subscribers'
            }
            ];

            const initialUserActivityData = [{{ $dailyActiveUsers }}, {{ $weeklyActiveUsers }},
                {{ $monthlyActiveUsers }}
            ];

            // === INIT ECHARTS ===
            const materialsChart = echarts.init(document.querySelector("#materialsChart"));
            const userActivityChart = echarts.init(document.querySelector("#userActivityChart"));

            // === FUNCTION TO UPDATE MATERIALS CHART ===
            function updateMaterialsChart(data) {
                materialsChart.setOption({
                    tooltip: {
                        trigger: 'item'
                    },
                    legend: {
                        top: '5%',
                        left: 'center'
                    },
                    series: [{
                        name: 'Total',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            label: {
                                show: true,
                                fontSize: '18',
                                fontWeight: 'bold'
                            }
                        },
                        labelLine: {
                            show: false
                        },
                        data: data
                    }]
                });
            }

            // === FUNCTION TO UPDATE USER ACTIVITY CHART ===
            function updateUserActivityChart(data) {
                userActivityChart.setOption({
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
                        type: 'category',
                        data: ['Daily', 'Weekly', 'Monthly']
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                        data: data,
                        type: 'bar',
                        barWidth: '50%',
                        itemStyle: {
                            color: '#4e73df'
                        }
                    }]
                });
            }

            // === INITIAL CHART LOAD ===
            updateMaterialsChart(initialMaterialsData);
            updateUserActivityChart(initialUserActivityData);

            // === AUTO REFRESH EVERY 30 SECONDS ===
            setInterval(() => {
                axios.get('{{ route('reports.usageStats') }}')
                    .then(response => {
                        const stats = response.data;
                        const updatedMaterialsData = [{
                            value: stats.resources,
                            name: 'Resources'
                        },
                        {
                            value: stats.notes,
                            name: 'Notes'
                        },
                        {
                            value: stats.users,
                            name: 'Users'
                        },
                        {
                            value: stats.subscribers,
                            name: 'Subscribers'
                        }
                        ];
                        updateMaterialsChart(updatedMaterialsData);
                    });

                axios.get('{{ route('reports.active-users') }}')
                    .then(response => {
                        const active = response.data;
                        const updatedUserActivityData = [active.daily, active.weekly, active.monthly];
                        updateUserActivityChart(updatedUserActivityData);
                    });

            }, 30000); // refresh every 30s
        });


        document.addEventListener("DOMContentLoaded", () => {
            axios.get('{{ route('reports.active-users') }}')
                .then(response => {
                    const data = response.data;
                    const userActivityChart = echarts.init(document.querySelector("#userActivityChart"));
                    userActivityChart.setOption({
                        tooltip: { trigger: 'axis' },
                        xAxis: {
                            type: 'category',
                            data: ['Daily', 'Weekly', 'Monthly']
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [{
                            data: [data.daily, data.weekly, data.monthly],
                            type: 'bar',
                            barWidth: '50%',
                            itemStyle: {
                                color: '#4e73df'
                            }
                        }]
                    });
                });
        });

        setInterval(() => {
            axios.get('{{ route('reports.onlineUsers') }}')
                .then(response => {
                    const container = document.querySelector('.card-body ul.list-group');
                    container.innerHTML = '';

                    response.data.users.forEach(user => {
                        container.innerHTML += `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            ${user.name}
                            <span class="badge bg-success">Online</span>
                        </li>`;
                    });

                    document.querySelector('.card-title').textContent = `Online Users (${response.data.count})`;
                });
        }, 30000); // refresh every 30 seconds

    </script>

@endsection